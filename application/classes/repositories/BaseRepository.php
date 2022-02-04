<?php

namespace Repositories;


use Doctrine\ORM\QueryBuilder as QueryBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class BaseRepository
{
	/** @var \Doctrine\ORM\EntityManager $entityManager */
	protected $entityManager;
	
	protected $logThreshold;
	protected $log;
	
	public function __construct() {
		$CI =& get_instance();
		
		$this->logThreshold = $CI->config->item('log_threshold');
		
		$this->entityManager = $CI->doctrine->entityManager;

		$this->log = new Logger(get_class($this));
		$this->log->pushHandler(new StreamHandler($CI->config->item('log_path') . 'debug_' . date('Y-m-d') . '.log', Logger::WARNING));
	}

	protected function sortAndLimit(QueryBuilder &$query, array $sort = array(), $filter) {
		//$sorters = array();
		//if( $sort != null ) {
		//	foreach($sort as $idx => $dir)
		//		$sorters[] = $idx . ($dir == 'desc' ? ' desc' : '');
		//}

		if( count($sort) ) {
			//$query->orderBy(implode(',', $sorters));
			foreach($sort as $idx => $dir)
				$query->addOrderBy($idx, $dir);
		}
		
		
		//în grid2 numerotarea paginilor începe de la 1.
		if ($filter->getPage() && $filter->getRows()) {

			$start = (int) $filter->getRows() * (int) $filter->getPage() - (int) $filter->getRows();

			$query->setFirstResult($start)->setMaxResults((int) $filter->getRows());
		}
		
	}

	/**
	 * Se aplică pentru tabele care au start_date și end_date. Data de referință din filtru este 
	 * verificată să fie în intervalul start_date - end_date. Funcția ignoră componentele de timp
	 * pentru parametri de filtrare (nu și pentru datele din baza de date).
	 * 
	 * @param \QueryBuilder $query
	 * @param \Repositories\BaseFilter $filter
	 * @param string $prefix Prefixul tabelului în care se verifică data de referință din query-ul Doctrine
	 */
	protected function filterReferenceDate(QueryBuilder &$query, BaseFilter $filter, $prefix) {
		if( $filter->getReferenceDate() ) {
			$query->andWhere("$prefix.startDate <= :referenceDate")
					->andWhere("($prefix.endDate is null or $prefix.endDate >= :referenceDate)");

			$query->setParameter('referenceDate', $filter->getReferenceDate()->format('Y-m-d H:i:s'));
		}
	}

	/**
	 * Se aplică pe tabele care au start_date și end_date care sunt verificate să se suprapună
	 * cu startDate și endDate din filtru în cel puțin o zi. Funcția ignoră componentele de timp
	 * pentru parametri de filtrare (nu și pentru datele din baza de date).
	 * 
	 * @param \QueryBuilder $query
	 * @param \Repositories\BaseFilter $filter
	 * @param string $prefix Prefixul tabelului pentru care se face verificarea
	 */
	protected function filterTimeInterval(QueryBuilder &$query, BaseFilter $filter, $prefix) {
		if( $filter->getStartDate() && $filter->getEndDate() ) {
			$startDate = $filter->getStartDate()->format('Y-m-d H:i:s');
			$endDate = $filter->getEndDate()->format('Y-m-d H:i:s');

			$query->andWhere("($prefix.startDate between ? and ? or $prefix.endDate between ? and ?)"
					, array($startDate, $endDate, $startDate, $endDate));
		}
		else if( $filter->getStartDate() ) {
			$date = $filter->getStartDate()->format('Y-m-d H:i:s');

			$query->andWhere("($prefix.startDate >= ? or $prefix.endDate >= ?)", array($date, $date));
		}
		else if( $filter->getEndDate() )
			$query->andWhere("$prefix.startDate <= ?", $filter->getEndDate( )->format('Y-m-d H:i:s'));
	}

	/**
	 * Se aplică pentru tabele care au un câmp de tip dată și care este verificată să fie în intervalul
	 * startDate - endDate al filtrului. Funcția ignoră componentele de timp pentru parametri de filtrare
	 * (nu și pentru datele din baza de date).
	 * 
	 * @param \QueryBuilder $query
	 * @param \Repositories\BaseFilter $filter
	 * @param string $field Numele Doctrine complet, inclusiv prefixul, al câmpului care se verifică.
	 */
	protected function filterInterval(QueryBuilder &$query, BaseFilter $filter, $field) {
		if( $filter->getStartDate() && $filter->getEndDate() ) {
			$startDate = $filter->getStartDate()->format('Y-m-d H:i:s');
			$endDate = $filter->getEndDate()->format('Y-m-d H:i:s');

			$query->andWhere("$field between :startDate and :endDate");

			$query->setParameter('startDate', $startDate);
			$query->setParameter('endDate', $endDate);
		}
		else if( $filter->getStartDate() ){
			$query->andWhere("$field >= :startDate");
			$query->setParameter('startDate', $filter->getStartDate()->format('Y-m-d H:i:s'));
		}
		else if( $filter->getEndDate() ){
			$query->andWhere("$field <= :endDate");
			$query->setParameter('endDate', $filter->getEndDate()->format('Y-m-d H:i:s'));
		}
	}

	protected function filterTimeLimits(QueryBuilder &$query, BaseFilter $filter, $prefix) {
		if( $filter->getStartDateLowerLimit() )
			$query->andWhere("$prefix.startDate >= ?", $filter->getStartDateLowerLimit());

		if( $filter->getStartDateUpperLimit() )
			$query->andWhere("$prefix.startDate <= ?", $filter->getStartDateUpperLimit());

		if( $filter->getEndDateLowerLimit() )
			$query->andWhere("$prefix.endDate >= ?", $filter->getEndDateLowerLimit());

		if( $filter->getEndDateUpperLimit() )
			$query->andWhere("$prefix.endDate <= ?", $filter->getEndDateUpperLimit());
	}

	protected function _logException(Exception $exception) {
		if( $this->logThreshold < 2 )
			return;

		// 
		// reverse array to make steps line up chronologically
		$trace = array_revers(explode("\n", $exception->getTraceAsString()));

		array_shift($trace); // remove {main}
		array_pop($trace); // remove call to this method
		$length = count($trace);
		$result = array();

		for ($i = 0; $i < $length; $i++) {
			// replace '#someNum' with '$i)', set the right ordering
			$result[] = ($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')); 
		}

		log_message('debug', "\t" . implode("\n\t", $result));
	}
}
