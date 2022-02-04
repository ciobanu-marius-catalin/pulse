<?php

namespace Pulse\Data;

use Doctrine\ORM\QueryBuilder as QueryBuilder;
use Repositories\BaseRepository as BaseRepository;
use Doctrine\ORM\Query\Expr\Join;

require_once(APPPATH . 'classes/crypt/PasswordHash.php');
require_once(APPPATH . 'classes/repositories/BaseRepository.php');
require_once(APPPATH . 'models/infrastructure/User.php');

require_once('AuthenticateInput.php');
require_once('UserFilter.php');
require_once('UserRoleFilter.php');
require_once('RoleFilter.php');
require_once('UserActivityFilter.php');
require_once('UserStatusFilter.php');

class UsersRepository extends BaseRepository {

    public function __construct() {
        parent::__construct();
    }

    public function authenticate(AuthenticateInput $input) {
        $redirect = '/';
        if ($input->getRedirect()) {

            $redirect = $input->getRedirect();
            if (strlen(trim($redirect)) == 0)
                $redirect = '/';
        }
		
        $filter = new UserFilter();
        $filter->setUsername($input->getUsername());
        $user = $this->getUser($filter);

        $input->getCI()->
                session->
                set_userdata(array('user_id' => $user->getId()));
		
		return $redirect;
    }

	protected function _queryUsers(UserFilter $filter) {

		$query = $this->entityManager->createQueryBuilder();

		$query->select('u');

		$query->from('\Pulse\Models\User', 'u');

		if( $filter->getStatus() ) {
			$query->innerJoin
					(
					'\Pulse\Models\UserStatus'
					, 'us'
					, Join::WITH
					, 'us.userId = u.id'
					. ' AND us.deleted = 0'
			);
			
			$this->filterReferenceDate($query, $filter, 'u');
		}
		
		if( $filter->getContactId() || $filter->getFamilyName() || array_key_exists('familyName', $filter->getSort())
			|| $filter->getSearchFamilyName()
			|| $filter->getGivenName() || array_key_exists('givenName', $filter->getSort()) 
			|| $filter->getSearchGivenName()
			|| $filter->getEmail() || array_key_exists('email', $filter->getSort())	|| $filter->getSearchEmail()) {
			$query->innerJoin('Pulse\Models\Contact'
					, 'c'
					, Join::WITH
					, 'u.contactId = c.id  AND c.deleted = 0'
			);
		}

		$query->Where('u.deleted = 0');
		
		if( $filter->getStatus() ) {
			$query->andWhere('us.status = :status')
					->setParameter('status', $filter->getStatus());
			$this->filterReferenceDate($query, $filter, 'us');
		}

		if ($filter->getId()) {
            $query->andWhere('u.id = :id')
                    ->setParameter('id', $filter->getId());
        }

        if ($filter->getUsername()) {
            $query->andWhere('u.username = :username')
                    ->setParameter('username', $filter->getUsername());
        }
		
		if($filter->getContactId()) {
			$query->andWhere('u.contactId = :id')
					->setParameter('id', $filter->getContactId());
		}
		
		if($filter->getFamilyName()){
			$query->andWhere('c.familyName = :familyName')
					->setParameter('familyName', $filter->getFamilyName());
		}
		
		if($filter->getGivenName()){
			$query->andWhere('c.givenName = :givenName')
					->setParameter('givenName', $filter->getGivenName());
		}
		
		if($filter->getEmail()){
			$query->andWhere('c.email = :email')
					->setParameter('email', $filter->getEmail());
		}
		
		if( $filter->getSearchUsername() ) {
			$query->andWhere('UPPER(u.username) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchUsername() . '%');
		}
		
		if( $filter->getSearchGivenName() ) {
			$query->andWhere('UPPER(c.givenName) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchGivenName() . '%');
		}
		
		if( $filter->getSearchFamilyName() ) {
			$query->andWhere('UPPER(c.familyName) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchFamilyName() . '%');
		}
		if( $filter->getSearchEmail() ) {
			$query->andWhere('UPPER(c.email) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchEmail() . '%');
		}

        $sort = array();

        foreach ($filter->getSort() as $idx => $ord) {
            switch ($idx) {
                case 'username' : $sort['u.username'] = $ord;
					break;
				case 'familyName' : $sort['c.familyName'] = $ord;
                    break;
				case 'givenName' : $sort['c.givenName'] = $ord;
					break;
				case 'email' : $sort['c.email'] = $ord;
					break;
            }
        }

        $this->sortAndLimit($query, $sort, $filter);

        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
    }

    public function countUsers(UserFilter $filter) {

        $data = $this->_queryUsers($filter);

        return $data->count();
    }

    public function getUsers(UserFilter $filter) {

        $data = $this->_queryUsers($filter);

        return $data;
    }

    public function getUser($arg) {
        if (is_numeric($arg))
            return $this->entityManager->find('\Pulse\Models\User', $arg);
        else if ($arg instanceof UserFilter) {
            $users = $this->getUsers($arg);

            if (count($users) == 1)
                return $users->getIterator()->current();
        } else
            return null;
    }

    protected function _queryUserRoles(UserRoleFilter $filter) {

        $query = $this->entityManager->createQueryBuilder();

        $query->select('ur');

        $query->from('\Pulse\Models\UserRole', 'ur');

        if ($filter->getUsername() || array_key_exists('username', $filter->getSort())) {
            $query->innerJoin('\Pulse\Models\User'
                    , 'u'
                    , Join::WITH
                    , 'u.id = ur.userId AND u.deleted = 0'
            );
        }

        if ($filter->getRoleName() || array_key_exists('roleName', $filter->getSort())) {
            $query->innerJoin ('\Pulse\Models\Role'
                    , 'r'
                    , Join::WITH
                    , 'r.id = ur.roleId  AND r.deleted = 0'
            );
        }

        $query->Where('ur.deleted = 0');

        $this->filterReferenceDate($query, $filter, 'ur');

        if ($filter->getId()) {
            $query->andWhere('ur.id = :id')
                    ->setParameter('id', $filter->getId());
        }

        if ($filter->getUserId()) {
            $query->andWhere('ur.userId = :userId')
                    ->setParameter('userId', $filter->getUserId());
        }

        if ($filter->getRoleId()) {
            $query->andWhere('ur.roleId = :roleId')
                    ->setParameter('roleId', $filter->getRoleId());
        }

        if ($filter->getUsername()) {
            $query->andWhere('u.username = :username')
                    ->setParameter('username', $filter->getUsername());
        }

        if ($filter->getRoleName()) {
            $query->andWhere('r.name = :roleName')
                    ->setParameter('roleName', $filter->getRoleName());
        }

        $sort = array();

        foreach ($filter->getSort() as $idx => $ord) {
            switch ($idx) {
                case 'username' : $sort['u.username'] = $ord;
                    break;
                case 'roleName' : $sort['r.name'] = $ord;
                    break;
            }
        }

        $this->sortAndLimit($query, $sort, $filter);

        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
    }

    public function countUserRoles(UserRoleFilter $filter) {

        $data = $this->_queryUserRoles($filter);

        return $data->count();
    }

    public function getUserRoles(UserRoleFilter $filter) {

        $data = $this->_queryUserRoles($filter);

        return $data;
    }

    public function getUserRole($arg) {
        if (is_numeric($arg))
            return $this->entityManager->find('\Pulse\Models\UserRole', $arg);
        else if ($arg instanceof UserRoleFilter) {
            $roles = $this->getUserRoles($arg);

            if (count($roles) == 1)
                return $roles->getIterator()->current();
        } else
            return null;
    }

    protected function _queryRoles(RoleFilter $filter) {

        $query = $this->entityManager->createQueryBuilder();

        $query->select('r');

        $query->from('\Pulse\Models\Role', 'r');

        $query->Where('r.deleted = 0');

        if ($filter->getId()) {
            $query->andWhere('r.id = :roleId')
                    ->setParameter('roleId', $filter->getId());
        }

        if ($filter->getName()) {
            $query->andWhere('r.name = :roleName')
                    ->setParameter('roleName', $filter->getName());
        }

        if ($filter->getDescription()) {
            $query->andWhere('r.description = :roleDescription')
                    ->setParameter('roleDescription', $filter->getDescription());
        }
		
		if( $filter->getSearch() ) {
			$query->andWhere('r.name LIKE :search')
					->setParameter('search', '%' . $filter->getSearch() . '%');
		}

        $sort = array();

        foreach ($filter->getSort() as $idx => $ord) {
            switch ($idx) {
                case 'name' : $sort['r.name'] = $ord;
                    break;
                case 'description' : $sort['r.description'] = $ord;
                    break;
            }
        }

        $this->sortAndLimit($query, $sort, $filter);

        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
    }

    public function countRoles(RoleFilter $filter) {

        $data = $this->_queryRoles($filter);

        return $data->count();
    }

    public function getRoles(RoleFilter $filter) {
		
        $data = $this->_queryRoles($filter);

        return $data;
    }

    public function getRole($arg) {

        if (is_numeric($arg))
            return $this->entityManager->find('\Pulse\Models\Role', $arg);
        else if ($arg instanceof RoleFilter) {
            $roles = $this->getRoles($arg);

            if (count($roles) == 1)
                return $roles->getIterator()->current();
        } else
            return null;
    }

    protected function _queryUserStatuses(UserStatusFilter $filter) {

        $query = $this->entityManager->createQueryBuilder();

        $query->select('us');

        $query->from('\Pulse\Models\UserStatus', 'us');

        if ($filter->getUsername() || array_key_exists('username', $filter->getSort())) {
            $query->innerJoin('\Pulse\Models\User'
                    , 'u'
                    , Join::WITH
                    , 'us.userId = u.id AND u.deleted = 0'
            );
        }

        $query->Where('us.deleted = 0');

        $this->filterReferenceDate($query, $filter, 'us');

        if ($filter->getId()) {
            $query->andWhere('us.id = :id')
                    ->setParameter('id', $filter->getId());
        }

        if ($filter->getUserId()) {
            $query->andWhere('us.userId = :userId')
                    ->setParameter('userId', $filter->getUserId());
        }

        if ($filter->getStatus()) {
            $query->andWhere('us.status = :status')
                    ->setParameter('status', $filter->getStatus());
        }

        if ($filter->getUsername()) {
            $query->andWhere('u.username = :username')
                    ->setParameter('username', $filter->getUsername());
        }

        $sort = array();

        foreach ($filter->getSort() as $idx => $ord) {
            switch ($idx) {
                case 'username' : $sort['u.username'] = $ord;
                    break;
                case 'status' : $sort['us.status'] = $ord;
                    break;
            }
        }

        $this->sortAndLimit($query, $sort, $filter);


        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
    }

    public function getUserStatuses(UserStatusFilter $filter) {

        $data = $this->_queryUserStatuses($filter);

        return $data;
    }

    public function countUserStatuses(UserStatusFilter $filter) {
        $data = $this->_queryUserStatuses($filter);

        return $data->count();
    }

    public function getUserStatus($arg) {

        if (is_numeric($arg))
            return $this->entityManager->find('\Pulse\Models\UserStatus', $arg);
        else if ($arg instanceof UserStatusFilter) {
            $statuses = $this->getUserStatuses($arg);

            if (count($statuses) == 1)
                return $statuses->getIterator()->current();
        } else
            return null;
    }

    protected function _queryUserActivities(UserActivityFilter $filter) {

        $query = $this->entityManager->createQueryBuilder();

        $query->select('ua');

        $query->from('\Pulse\Models\UserActivity', 'ua');

        if ($filter->getUsername() || array_key_exists('username', $filter->getSort())) {
            $query->innerJoin ( '\Pulse\Models\User'
                    , 'u'
                    , Join::WITH
                    , 'ua.userId = u.id AND u.deleted = 0'
            );
        }

        $query->where('ua.deleted = 0');

        if ($filter->getId()) {
            $query->andWhere('ua.id = :id')
                    ->setParameter('id', $filter->getId());
        }

        if ($filter->getUserId()) {
            $query->andWhere('ua.userId = :userId')
                    ->setParameter('userId', $filter->getUserId());
        }

        if ($filter->getLoginDate()) {
            $query->andWhere('ua.loginDate = :loginDate')
                    ->setParameter('loginDate', $filter->getLoginDate());
        }

        if ($filter->getUsername()) {
            $query->andWhere('u.username = :username')
                    ->setParameter('username', $filter->getUsername());
        }

        $sort = array();

        foreach ($filter->getSort() as $idx => $ord) {
            switch ($idx) {
                case 'username' : $sort['u.username'] = $ord;
                    break;
                case 'loginDate' : $sort['ua.loginDate'] = $ord;
                    break;
            }
        }

        $this->sortAndLimit($query, $sort, $filter);

        return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
    }

    public function getUserActivities(UserActivityFilter $filter) {

        $data = $this->_queryUserActivities($filter);

        return $data;
    }

    public function countUserActivities(UserActivityFilter $filter) {

        $data = $this->_queryUserActivities($filter);

        return $data->count();
    }

    public function getUserActivity($arg) {

        if (is_numeric($arg))
            return $this->entityManager->find('\Pulse\Models\UserActivity', $arg);
        else if ($arg instanceof UserActivityFilter) {
            $activities = $this->getUserActivities($arg);

            if (count($activities) == 1)
                return $activities->getIterator()->current();
        } else
            return null;
    }

    public function addUser(AddUserInput $input) {
		
		//Nu e facut
		
		$this->entityManager->getConnection()->beginTransaction();
					
			$user = new \pulse\models\User();
			
			$user->setUsername($input->getUserName());
			//$user->getUserStatus()->setStartDate(new \DateTime('now'));
			$pw = new \PasswordHash();
			$pswd = $pw->getHash($input->getPassword());
			$user->setPassword($pswd);
						
			$contact = new \pulse\models\Contact();
			$contact->setGivenName($input->getGivenName());			
			$contact->setFamilyName($input->getFamilyName());
			$contact->setEmail($input->getEmail());
			$user->setContact($contact);			
			
			
			
			//$filter->setUsername($input->getUserName());
//			foreach ($input->getRoles() as $rol)
//			{
//				$userRepository=new \Pulse\Data\UsersRepository;
//				$filter=new Pulse\Data\RoleFilter;
//				$filter->setName($rol);				
//				$roleObject=$userRepository->getRole($filter);
//				$role = new \pulse\models\UserRole();
//				$role->setUserId($user->getId());
//				$role->setRoleId($roleObject->getId());
//				
//				
//			}
//			$role->setUsername($input->getRoles());
//			$user->setUserRoles($role);

		try  {
			
			//$this->entityManager->persist($role);
			$this->entityManager->persist($user);
			$this->entityManager->persist($contact);
			$this->entityManager->flush();
			
			foreach ($input->getRoles() as $rol)
			{
				//throw new \Exception($rol);
				$userRepository=new \Pulse\Data\UsersRepository();
				$filter=new \Pulse\Data\RoleFilter();
				$filter->setName($rol);				
				$roleObject=$userRepository->getRole($filter);
				$role = new \pulse\models\UserRole();
				//$role->setUserId($user->getId());
				$role->setStartDate(new \DateTime());
				$role->setRole($roleObject);
				$role->setUser($user);
//				$roleObject->setUserRole($role);
//				$user->setUserRoles($role);
				//throw new \Exception($user->getId() . ' ' . $roleObject->getId());
				
				$this->entityManager->persist($role);
				$this->entityManager->flush();
			}
			
			
				
				

			$this->entityManager->getConnection()->commit();

			return $user;			

        } catch (Exception $exception) {
			
			$this->_logException($exception);
            $this->entityManager->getConnection()->rollback();
        }
    }
	
	public function deleteUser(DeleteUserInput $input) {
		
		$this->entityManager->getConnection()->beginTransaction();
		try {
			$users = new \Pulse\Data\UsersRepository();
			
			$user = $this->entityManager->getReference('\Pulse\Models\User', $input->getUserId());
			$contact = $this->entityManager->getReference('\Pulse\Models\Contact', $input->getUserId());
			$userStatus = $this->entityManager->getReference('\Pulse\Models\UserStatus', $input->getUserId());
			
			//Cred ca trebuie sa setez deleted si la contact si status
			
			$user->setDeleted(1);
			$contact->setDeleted(1);
			$userStatus->setDeleted(1);

			$this->entityManager->flush();
			$this->entityManager->getConnection()->commit();
		}
		catch(Exception $exception) {
			$this->entityManager->getConnection()->rollback();
		}
	}

}
