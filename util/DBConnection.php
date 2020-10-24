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
function getRowsCount($table)
{
    $conn = OpenConnection();
    $query = "select count(*) from $table";
    $excute = sqlsrv_query($conn,$query);
    while($row = sqlsrv_fetch_array($excute, SQLSRV_FETCH_ASSOC))
    {
        return $row;
    }    
}
function Delete($table,$columnname,$value)
{
    $conn = OpenConnection();
    $query = "";
    if(is_string($value))
    {
       $query = "DELETE FROM $table WHERE $columnname = '$value'";
    }
    else
    {
        $query = "DELETE FROM $table WHERE $columnname = $value";
        
    }
   $excute = sqlsrv_query($conn, $query);
   return $excute;
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
function getTableValues($table,$stmt,$page,$columnname)
{
    if ($page == 1)
    {
        $offset = 0;
    }
    else
    {
        $offset = 100 * ($page -1);

    }
    $stmt = $stmt." ORDER BY CURRENT_TIMESTAMP
    OFFSET     $offset ROWS      
    FETCH NEXT 100 ROWS ONLY";
    $conn = OpenConnection();
    $query = sqlsrv_query($conn,$stmt);
    $i = 0;
    while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
    {
        echo  "<tr>";
        echo "<td>$i</td>";
       
        foreach ($columnname as $key)
    {
        if ($key == 'fishstatus' || $key == 'locationstatus' || $key =='typestatus' ||$key =='ticketstatus' || $key == 'eventstatus')
        {continue;}
        else
        {
        echo "<td>  $row[$key] </td>";
        }
        
    }
    switch($table)
    {
        case 'fish':
            
    $fishid = getId('fish',$row['fishscientificname']);
    if ($row['fishstatus'] == 1 )
        {
            echo  "<td>  <input class=\"form-check-input ml-3 check fish\" type=\"checkbox\"value=\"option1\" id =\"$fishid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
        </td>";
        }
        else
        {echo  "<td>     <input class=\"form-check-input ml-3 check fish\" type=\"checkbox\"value=\"option1\" id =\"$fishid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
            </td>";}
    
        echo "<td>
        <a href=\"#myModal\" class=\"edit fish\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\"  data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
        <a href=\"#deleteModal\" class=\"delete fish\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
            </td>";
        echo "</tr>";
        $i++;
        break;

        case 'location':
            $locationid = getId('location',$row['locationname']);
   
            if ($row['locationstatus'] == 1 )
            {
                echo  "<td>  <input class=\"form-check-input ml-3 check location\" type=\"checkbox\"value=\"option1\" id =\"$locationid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
            </td>";
            }
            else
            {echo  "<td>     <input class=\"form-check-input ml-3 check location\" type=\"checkbox\"value=\"option1\" id =\"$locationid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
                </td>";}
        
            echo "<td>
            <a href=\"#deleteModal\" class=\"delete location\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                </td>";
            echo "</tr>";
            $i++;
        break;

        case 'type':
            $typeid = getId('type',$row['typename']);
   
            if ($row['typestatus'] == 1 )
            {
                echo  "<td>  <input class=\"form-check-input ml-3 check type\" type=\"checkbox\"value=\"option1\" id =\"$typeid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
            </td>";
            }
            else
            {echo  "<td>     <input class=\"form-check-input ml-3 check type\" type=\"checkbox\"value=\"option1\" id =\"$typeid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
                </td>";}
        
            echo "<td>
            <a href=\"#deleteModal\" class=\"delete type\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                </td>";
            echo "</tr>";
            $i++;
        break;
        
        case 'ticket':

            $ticketid = getId('ticket',$row['ticketname']);
            if ($row['ticketstatus'] == 1 )
                {
                    echo  "<td>  <input class=\"form-check-input ml-3 check ticket\" type=\"checkbox\"value=\"option1\" id =\"$ticketid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
                </td>";
                }
                else
                {echo  "<td>     <input class=\"form-check-input ml-3 check ticket\" type=\"checkbox\"value=\"option1\" id =\"$ticketid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
                    </td>";}
            
                echo "<td>
                <a href=\"#myModal\" class=\"edit ticket\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\"  data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
                <a href=\"#deleteModal\" class=\"delete ticket\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                    </td>";
                echo "</tr>";
                $i++;

        break;

        case 'event':

            $eventid = getId('event',$row['eventname']);
            if ($row['eventstatus'] == 1 )
                {
                    echo  "<td>  <input class=\"form-check-input ml-3 check event\" type=\"checkbox\"value=\"option1\" id =\"$eventid\" name=\"checkbox\" aria-label=\"...\" checked style='position: inherit;'>
            </td>";
            }
            else
            {echo  "<td>     <input class=\"form-check-input ml-3 check event\" type=\"checkbox\"value=\"option1\" id =\"$eventid\" name=\"checkbox\" aria-label=\"...\" style='position: inherit';>
                </td>";}
            
                echo "<td>
                <a href=\"#myModal\" class=\"edit event\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\"  data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
                <a href=\"#deleteModal\" class=\"delete event\" value=\"$i\"  data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                    </td>";
                echo "</tr>";
                $i++;

        break;
    }
    
        
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
    if($table == "fish")
    {
    $valcolumnname = $table."scientificname";
    }
else{
    $valcolumnname = $table."name";
}
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

function Update($item,$id,$cond ){
    try{
        $conn = OpenConnection();
        $tableName = get_class($item); // get class name
        $query = "UPDATE $tableName SET ";
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
        
        foreach(array_combine($classProperties,$fields ) as $columnitem=>$fielditem)
        {
       
            $query .= $columnitem ."=";
            if (is_string($fielditem))
            {
               
                $query .= "'$fielditem'".",";
            }
            else
            {
                $query .= $fielditem.",";
            }

        }
        $query = substr($query,0, strlen($query) -1);
            $query .= " WHERE $cond = $id";   
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