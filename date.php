 <?php
 	$seats=$_POST['seats'];
 	$name=$_POST['name'];
 	$email=$_POST['email'];


 	$json=array('loc'=>explode(',',$seats),'nume'=>$name,'email'=>$email);

 	$filename="data.json";

$handle = @fopen($filename, 'r+');

if ($handle === null)
{
    $handle = fopen($filename, 'w+');
}

if ($handle)
{
    fseek($handle, 0, SEEK_END);

    if (ftell($handle) > 0)
    {
        fseek($handle, -2, SEEK_END);

        fwrite($handle, ',', 1);

        fwrite($handle, json_encode($json) . ']}');
    }
    else
    {
        fwrite($handle, json_encode(array($json)));
    }

        fclose($handle);
}


?>