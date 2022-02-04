<?php

namespace Pulse\Data;

use Doctrine\ORM\QueryBuilder as QueryBuilder;
use Repositories\BaseRepository as BaseRepository;
use Doctrine\ORM\Query\Expr\Join;

require_once(APPPATH . 'classes/repositories/BaseRepository.php');

require_once(APPPATH . 'models/Structure.php');
require_once(APPPATH . 'models/StructureDetail.php');
require_once('StructureFilter.php');

class Structures extends BaseRepository
{
	public function __construct() {
		parent::__construct();
	}

	protected function _queryStructures(StructureFilter $filter) {
		
		$query = $this->entityManager->createQueryBuilder();

		$query->select('s');

		$query->from('Pulse\Models\Structure', 's');
        
        if($filter->getDetailId() || $filter->getParentId() || $filter->getDetailName() || $filter->getCode() || $filter->getLeft() || $filter->getRight() ){
            $query->innerJoin('Pulse\Models\StructureDetail ','sd',Join::WITH, 's.id =sd.structureID and sd.deleted=0');
		}
		
		$query->andWhere('s.deleted=0');
            
		
			if ($filter->getDetailId()) {
				$query->andWhere('sd.id=:detailId AND s.deleted=0')
					  ->setParameter('detailId',$filter->getDetailId());
            }        

            if ($filter->getParentId()) {
                $query->andWhere('sd.parentId=:parentId AND s.deleted=0')
                      ->setParameter('parentId',$filter->getParentId());
            }

            if ($filter->getDetailName()) {
                $query->andWhere('sd.name=:detailName AND s.deleted=0')
                      ->setParameter('detailName',$filter->getDetailName());
            }

            if ($filter->getCode()) {
                $query->andWhere('sd.code=:code AND s.deleted=0')
                      ->setParameter('code',$filter->getCode());
            }

            if ($filter->getLeft()) {
                $query->andWhere('sd.left=:left AND s.deleted=0')
                      ->setParameter('left',$filter->getLeft());
            }

            if ($filter->getRight()) {
                $query->andWhere('sd.right=:right AND s.deleted=0')
                      ->setParameter('right',$filter->getRight());
            }
        
        if ($filter->getId()) {
			$query->andWhere('s.id = :id AND s.deleted=0')
                  ->setParameter('id',$filter->getId());
        }
       
        
		$sort = array();
    
    		foreach($filter->getSort() as $idx => $ord) {
    			switch($idx) {
                    case 'id': $sort['s.id'] = $ord; break;
    				case 'detailId': $sort['sd.id'] = $ord; break;
    				case 'parentId': $sort['sd.parentId'] = $ord; break;
    				case 'detailName': $sort['sd.name'] = $ord; break;
    				case 'code': $sort['sd.code'] = $ord; break;
    				case 'left': $sort['sd.left'] = $ord; break;
    				case 'right': $sort['sd.right'] = $ord; break;
    			}
    		}

            $this->sortAndLimit($query, $sort, $filter);
        
        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countStructures(StructureFilter $filter) {
		
		$data = $this->_queryStructures($filter);

		return $data->count();
	}

	public function getStructures(StructureFilter $filter) {
		
		$data = $this->_queryStructures($filter);

		return $data;	
	}

	public function getStructure($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('Pulse\Models\Structure', $arg);
		else if( $arg instanceof StructureFilter ) {
			$structures = $this->getStructures($arg);
			
			if( count($structures) == 1 )
				return $structures->getIterator()->current();
		}
		else
			return null;
	}
}
