<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Github;
use Composer\Util\Git;

/**
 * Search Controller
 *
 *
 * @method \App\Model\Entity\Search[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchController extends AppController
{
    public function search()
    {
        $search = $this->request->getData('search');
        $searchType = $this->request->getQuery('submit');

        $results = Github::SearchUsers($search);
        $results = json_decode($results, true);

        $this->set('results', $results);
    }

    public function followers()
    {
        $login = $this->request->getData('login');
        $page = $this->request->getData($login . '-page');

        $results = Github::GetFollowers($login, $page);
        $results = json_decode($results, true);

        $this->set('followers', $results);
    }
}
