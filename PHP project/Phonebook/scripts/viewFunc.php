<?php
function view($dbRow, $sortDirection, $conn, $phonebook){
      if(isset($_POST["submitsearch"])){
        $forsearch = safestrip($_POST["search"]);
        $sql = <<< SQL
        SELECT *
        FROM  $phonebook
        WHERE
        fullname LIKE '%$forsearch%'
        OR
        phonenumber LIKE '%$forsearch%'
        OR
        email LIKE '%$forsearch%'
        ORDER BY $dbRow $sortDirection
SQL;
        $result = $conn->query($sql);
        if ($result->num_rows>0) {
          while($row=$result->fetch_assoc()){
            $phone = $row["phonenumber"];
            $email = $row["email"];
            echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["fullname"]."</td>
            <td><a href=tel:$phone>".$phone."</a></td>
            <td>".$row["phonenumber2"]."</td>
            <td class = 'addrs'>".$row["address"]."</td>
            <td><a href='mailto:$email'>".$email."</a></td>
            <td>".$row["info"]."</td>
            <td>".$row["reg_date"]."</td>
            </tr>";
          }
        }
        else{
          echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
        }
      }
      else{
        $sql = <<<SQL
        SELECT *
        FROM $phonebook
        ORDER BY $dbRow $sortDirection
SQL;
        $result= $conn->query($sql);
        if ($result->num_rows>0) {
          while($row=$result->fetch_assoc()){
            $phone = $row["phonenumber"];
            $email = $row["email"];
            echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["fullname"]."</td>
            <td><a href=tel:$phone>".$phone."</a></td>
            <td>".$row["phonenumber2"]."</td>
            <td class = 'addrs'>".$row["address"]."</td>
            <td><a href='mailto:$email'>".$email."</a></td>
            <td>".$row["info"]."</td>
            <td>".$row["reg_date"]."</td>
            </tr>";
          }
        }
        else{
          echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
        }
      }
  }
?>
