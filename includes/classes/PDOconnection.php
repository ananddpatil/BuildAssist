<?php
/* Operate on the database using our super-safe PDO system */
class db
{
    /* PDO istance */
    private $db = NULL;
    /* Number of the errors occurred */
    private $errorNO = 0;

    /* Connect to the database, no db? no party */
    public function __construct()
    {
        try
        {
			$HST =HST;
$DBN=DBN;
$USR=USR;
$PWD=PWD;
            $this->db = new new PDO("mysql:host=$HST;dbname=$DBN", $USR, $PWD);  
				
            );
        }
        catch (Exception $e) 
        {
            exit('App shoutdown');
        }
    }

    /* Have you seen any errors recently? */
    public function getErrors() { return ($this->errorNO > 0) ? $this->errorNO : false; }

    /* Perform a full-control query */
    public function smartQuery($array)
    {
        # Managing passed vars
        $sql = $array['sql'];
        $par = (isset($array['par'])) ? $array['par'] : array();
        $ret = (isset($array['ret'])) ? $array['ret'] : 'res';

        # Executing our query
        $obj = $this->db->prepare($sql);
        $result = $obj->execute($par);

            # Error occurred...
            if (!$result) { ++$this->errorNO; }

        # What do you want me to return?
        switch ($ret)
        {
            case 'obj':
            case 'object':
                return $obj;
            break;

            case 'ass':
            case 'assoc':
            case 'fetch-assoc':
                return $obj->fetch(PDO::FETCH_ASSOC);
            break;

            case 'all':
            case 'fetch-all':
                return $obj->fetchAll();
            break;

            case 'res':
            case 'result':
                return $result;
            break;

            default:
                return $result;
            break;
        }
    }

    /* Get PDO istance to use it outside this class */
    public function getPdo() { return $this->db; }

    /* Disconnect from the database */
    public function __destruct() { $this->db = NULL; }
}
/*
$db = new MyPdoClass();
$db->connect();
$stmt = $db->query($sql, $params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// or call your MyPdoClass::fetchAll, which would do that so you would just call
$results = $db->fetchAll($sql, $params);
*/
?>