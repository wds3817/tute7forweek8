<?php  
    if(isset($_POST["submit"]))  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["password1"];  
        if($user == ""){  
            echo "<script>alert('请确'); history.go(-1);</script>";  
        }
        elseif($psw == ""){
            echo "<script>alert('请确认'); history.go(-1);</script>"; 
        }
        elseif($psw_confirm == ""){
            echo "success";
            echo "<script>alert('请确认信息完整性！');
            history.go(-1);</script>"; 
        }
        else  
        {  
            if($psw == $psw_confirm)  
            {  
                mysql_connect("localhost","dwang14","455946");   //连接数据库  
                mysql_select_db("dwang14");  //选择数据库  
                mysql_query("set names 'gdk'"); //设定字符集  
                $sql = "select username from users where username = '$user'"; //SQL语句  
                $result = mysql_query($sql);    //执行SQL语句  
                $num = mysql_num_rows($result); //统计执行结果影响的行数  
                if($num)    //如果已经存在该用户  
                {  
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称  
                {  
                    $sql_insert = "insert into users (username,password) values('$user','$psw')";  
                    $res_insert = mysql_query($sql_insert);  
                    //$num_insert = mysql_num_rows($res_insert);  
                    if($res_insert)  
                    {  
                        echo "<script>alert('注册成功！'); history.go(-2);</script>";  
                    }  
                    else  
                    {  
                        echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>  