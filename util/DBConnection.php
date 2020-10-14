<?php
    function OpenConnection(){
        try{
            $serverName = "(local)";
            $connectionInfo = array("Database"=>"aquarium","UID"=>"sa","PWD"=>"123456"); // remember to change database name
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            if ($conn)
            {
                //echo "Connection established";
                return $conn;
            }
            else
            {
                echo "Connection could not be established.</br>";
                die(print_r(sqlsrv_errors(),true));
            }

        }catch(Exception $e)
        {
            echo "Error";
        }return null;
    }   
function checkExist($table,$column,$value)
{
    $conn = OpenConnection();
    $query = "";
    if(is_string($value)){
        $query = "SELECT $column FROM $table WHERE $column ='$value'";
    }
    else
    {
        $query = "SELECT $column FROM $table WHERE $column =$value";
    }
    $check = sqlsrv_has_rows(sqlsrv_query($conn,$query));
    
    if ($check)
    {
        return true;
    }
    else{
       return false;
    }
}
function getTableValues($stmt,$page,$columnname)
{
    $conn = OpenConnection();
    $query = sqlsrv_query($conn,$stmt);
    $i = 0;
    while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
    {
        echo  "<tr>";
        echo "<td>$i</td>";
       
        foreach ($columnname as $key)
    {
        
        echo "<td>  $row[$key] </td>";
        
    }
    $fishid = $row['fishid'];
    if ($row['fishstatus'] == 1 )
        {
            echo  "<td>  <input class=\"form-check-input ml-3 check\" type=\"checkbox\"value=\"option1\" id =\"$fishid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
        </td>";
        }
        else
        {echo  "<td>     <input class=\"form-check-input ml-3 check\" type=\"checkbox\"value=\"option1\" id =\"$fishid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
            </td>";}
    
        echo "<td>
        <a href=\"#myModal\" class=\"edit\" data-val=$fishid  data-toggle=\"modal\"><i class=\"material-icons\" data-val=$fishid  data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
        <a href=\"#deleteEmployeeModal\" class=\"delete\" data-val=$fishid  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
            </td>";
        echo "</tr>";
        $i++;
    }

    
}
function getSelectedItems($table,$column)
{
    $returnArr = array();
    $conn = OpenConnection();
    $stmt = "Select $column from $table";
    $query = sqlsrv_query($conn, $stmt);
    while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
    {
        array_push($returnArr,$row[$column]);
    }
    return $returnArr;

}
function getId($table,$val)
{
    $conn = OpenConnection();
    $columnname = $table."id";
    $valcolumnname = $table."name";
    $stmt = "SELECT $columnname FROM $table WHERE $valcolumnname = '$val'";
    $query = sqlsrv_query($conn, $stmt);
    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    
        return $row[$table."id"];
    
}
function Create($item ){
    try{
        $conn = OpenConnection();
        $tableName = get_class($item); // get class name
        $query = "INSERT INTO $tableName (";
        $fields  = get_object_vars($item);
        $class = new ReflectionClass($tableName);
        $properties = $class->getProperties(); // get class properties
        foreach ($properties as $property) {
            // skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $class->getName()) {
              continue;
            }
    
            $classProperties[] = $property->getName();
          }
        
        foreach($classProperties as $columnitem)
        {
            $query .= $columnitem .",";

        }
        $query = substr($query,0,strlen($query)-1);
        $query .= ") VALUES(";
        foreach($fields as $fileditem)
        {
            if (is_string($fileditem))
            {
                $query .= "'$fileditem'".",";
            }
            else
            {
                $query .= $fileditem.",";
            }
        }
        $query = substr($query,0, strlen($query) -1);
        $query .= ")";
        $check = sqlsrv_query($conn,$query);
        if ($check == 0)
        {
            return false;
        }
        else{
           return true;
        }

    }
    catch (Exception $e)
    {
        echo("Error");
    }
} 
 ?>