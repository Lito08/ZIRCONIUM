<?php

function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

    }

    //redirect to login
    header("Location: login.php");
    die;

}

function getData($con)
{
    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $item = "SELECT products.*, type.* FROM products JOIN type ON type.id=products.ptype";

        $result = mysqli_query($con,$item);
        if($result && mysqli_num_rows($result) > 0)
        {
            $item_data = mysqli_fetch_assoc($result);
            return $item_data;
        }

    }
}

function getProduct($item_id = null, $table = 'products')
{
    if(isset($item_id))
    {
        $result = "SELECT * FROM products WHERE id='$item_id'";
        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) {

        $text .= rand(0,9);

    }

    return $text;

}
