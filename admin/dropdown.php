<?php
namespace pms;

use pms\DataSource;

class dropdown
{
    private $ds;
    
    function __construct()
    {
        include 'DataSource.php';
        $this->ds = new DataSource();
    }
    
    /**
     * to get the project record set
     *
     * @return array result record
     */
    public function getAllProject()
    {
        $query = "SELECT * FROM tbl_projects where status ='Active'";
        $result = $this->ds->select($query);
        return $result;
    }
    
    /**
     * to get the subproject record based on the project id
     *
     * @param string $projectId
     * @return array result record
     */
    public function getSubprojectByProjectId($projectId)
    {
        $query = "SELECT * FROM tbl_subprojects WHERE project_id = ?";
        $paramType = 'd';
        $paramArray = array(
            $projectId
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
}