<?php

include 'dbconnect.php';

if(isset($_POST['btnsave'])) {
    $pname = $_POST['txtname'];
    $price = $_POST['txtprice'];

    // echo "Name $pname and the price $price";
    if(!empty($pname && $price)) {
        $insert = $pdo->prepare("insert into tbl_product(productname, productprice) values (:name,:price);");
        $insert->bindParam(':name', $pname);
        $insert->bindParam(':price', $price);

        $insert->execute();

        if($insert->rowCount()) {
            echo "Insert Succesful";
        } else {
            echo 'Insert Fail';
        }

    } else {
        echo 'Fields are Empty';
    }
} //this is end of save btn

if(isset($_POST['btnupdate'])) {
    $pname = $_POST['txtname'];
    $price = $_POST['txtprice'];
    $id = $_POST['txtid'];

    if(!empty($pname && $price)) {
        $update = $pdo->prepare("update tbl_product set productname = :pname, productprice = :price where id =".$id);
        $update->bindParam(':pname', $pname);
        $update->bindParam(':price', $price);

        $update->execute();

        if($update->rowCount()) {
            echo "Data Update Succesful";
        } else {
            echo 'Update Fail!!!!';
        }

    } else {
        echo 'Fields are empty. Please Fill Fields !!!!';
    }
}//this is end of update btn

if(isset($_POST['btndelete'])) {
    $delete = $pdo->prepare("delete from tbl_product where id=".$_POST['btndelete']);
    $delete->execute();

    if($delete->rowCount()) {
        echo "Data Deleted Successful";
    } else {
        echo 'Delete Fail!!!!';
    }
}


?>

<h2>PHP PDO CRUD OPERATIONS</h2>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic CRUD</title>
</head>
<body>
    <form action="" method="POST">
        <?php
        if(isset($_POST['btnedit'])) {
            $select = $pdo->prepare("select * from tbl_product where id=" . $_POST['btnedit']);
            $select->execute();
            
            if($select) {
                $row = $select->fetch(PDO::FETCH_OBJ);
                //print_r($row);
                echo '
                <p><input type="text" name="txtname" value="'.$row->productname.'"></p>
                <p><input type="text" name="txtprice" value="'.$row->productprice.'"></p>
                <p><input type="hidden" name="txtid" value="'.$row->id.'"></p>
                <button type="submit"  name="btnupdate">Update</button>
                <button type="submit"  name="btncancel">Cancel</button>
                ';
            }
        } else {
            echo '
            <p><input type="text" name="txtname" placeholder="Product Name"></p>
            <p><input type="text" name="txtprice" placeholder="Product Price"></p>
            <input type="submit" value="Save" name="btnsave">
            
            ';
        }

        ?>
        <br><br><br>
        <table id="producttable" border="1" cellpadding="10" cellspacing="0">
            <thead>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $select = $pdo->prepare("select * from tbl_product");
                $select->execute();
                while($row = $select->fetch(PDO::FETCH_OBJ)) {
                    echo '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->productname.'</td>
                    <td>'.$row->productprice.'</td>
                    <td><button type="submit" value="'.$row->id.'" name="btnedit">Edit</button></td>
                    <td><button type="submit" value="'.$row->id.'" name="btndelete">Delete</button></td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>
<!--
//Just notes
<?php
// $select = $pdo->prepare("select * from tbl_product;");
// $select->execute();
// echo "<pre>";
//FETCH_NUM -> index array number
//FETCH_ASSOC -> index associative array
// while($row = $select->fetch(PDO::FETCH_OBJ)) {
     //echo $row[1]. "<br>"; //FETCH_NUM
     //echo $row['productname']."<br>"; //FETCH_ASSOC
     //echo $row->productname . "<br>"; //FETCH_OBJ
//     print_r($row);
// }
//$row = $select->fetchAll(PDO::FETCH_OBJ);
//we can fetch all the data directly without any loop (faster)
//print_r($row);
?>
-->

