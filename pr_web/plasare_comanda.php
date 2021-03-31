<?php

if(isset($_POST['plaseaza_comanda'])){
    include_once 'dbh.php';

    $uid=$_POST['id_user'];

   

    $sql = "SELECT * FROM cart WHERE Id_client=$uid";
    $result = mysqli_query($conn,$sql);
    $total=0;
    while( $row = mysqli_fetch_assoc($result))
    {
        $prod = $row['Id_produs'];
        $cant = $row['cantitate'];
        $sql2 = "SELECT * FROM Products where id=$prod";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $pret = $row2['price'];
        $total+=$pret*$cant;
    }

    $data = date ("Y-m-d H:i:s", time());
    $sql = "INSERT INTO comenzi(Id_client, Data ,pret) values ($uid,'$data','$total');";
    $result = mysqli_query($conn,$sql);            
    $orderid = mysqli_insert_id($conn);
    


    $sql = "SELECT * FROM cart WHERE Id_client=$uid";
    $result = mysqli_query($conn,$sql);
    $total=0;
    while( $row = mysqli_fetch_assoc($result))
    {
        $prod = $row['Id_produs'];
        $cant = $row['cantitate'];
        $sql2 = "SELECT * FROM Products where id=$prod";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $sql = "INSERT INTO detalii_comenzi(Id_comanda,Id_produs,cantitate) values($orderid,$prod,$cant);";
        mysqli_query($conn,$sql);

    }

    $sql = "DELETE FROM cart where Id_client=$uid";
                mysqli_query($conn,$sql);




                header('Location: proiect.php');

}
?>