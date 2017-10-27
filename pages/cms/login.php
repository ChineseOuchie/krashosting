<?php
include_once("config.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $emaillogin = $db->real_escape_string($_POST['username']);
    $wachtwoordlogin = $db->real_escape_string($_POST['password']);

    $arr = array(
        'username'=>array('(\<(/?[^\>]+)\>)'),
        'password'=>array('(\<(/?[^\>]+)\>)'),
    );

    $ok = true;
    foreach ($arr as $k=>$v) { //kijkt of wachtwoord geen xss heeft
        if (empty($_POST[$k])) {
            $ok = false;
            break;
        } else if (preg_match($v[0], $_POST[$k])) {
            $ok = false;
            break;
        }
    }
    if($ok) {
		$sql = "SELECT idmedewerkers, wachtwoord FROM medewerkers WHERE bedrijfsemail = '$emaillogin' and wachtwoord = '$wachtwoordlogin'";
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		$active = $row['active'];

		$count = $result->num_rows;

		$passwordgenny = array("$^@sx0uWv26Dq?lOV8Qf7F4D+U2_NX", "SSibiT5oBPn-rB9v?Zn242t%dG%rc%", "LiSRe#%2wYa-R66*bM6uxdQONk40t",
			"E&h4YfLOkC0**!xO2Sb1RA4G0!|8IT", "vSV^4I^9c7*zK7g-98+?5F%MY_CPr2", "18RJpl@Er?0+nFb=DXK8B$1T57a6y+", "N3rPBq2*s5DHRDKSh=zM=3v9!G2cE%", "W|teBWfEmRQw_4TGY|5e153i&z?+6@",
			"0y+Crxbu91ghxjL&lU*=J6%@hn9sEF", "1*dEsAuzWc_UY_R1CU2x-5-ZW^16Hj", "ye56t#B1Nvgf=jfd7tSC7g=-i4mV-+", "hb&u%9%1x9tDuxVJAFM1^wplt9a_m&", "*hvDda6%fMELcT2%Xw&csnE@Fwpi6w",
			"dQBc=h|Wu?N4v1OF0poVacB=@0Mu^i", "s2f34QH-x0k3co?L0V#%G3|_pzlNkm", "f41zq?NEhxp=J#=sZ0m?PP^Hf_N=AR", "A%QZnV|JPvEyHL=kFqWm%d420m5MFf", "7zEEU7KX_n@JvL0=QOoqnyJt6ye6f=",
			"#had3ofj6b#H5?9|ay+9mJ*Nb6lQ@|", "7Zg_zq-cf2FjcYJ^mC%8ky5D!=H1C+", "j?QcQ5#0jC8250EU^1BM4&8dRlOhk?", "62c#rgT#AJP56wQ&^b&^^xXfzA#*eg", "YzW6U$%GCMPmyIn9t+md^Ri3eg1qOQ",
			"4Z3C%ZY7&idpGW_g3P-+D1HA^!6VB8", "$1iT=ZAzPCZztnx0cxi$+3d*&P1_^X", "!k+FRPp$=4#h+IcQZs&uYY%NVj@xzq", "fpH7Znf?BR+Ec34ot*_A7BxCNlQ*#4", "Wm_jQKV2v%SyRDzr9yF8pGqk!=Ce29",
			"1S_9Aby?g@KgIFsd0^tDP%W&J4!0R7", "Kq=h_El9BzQRzL1!*Pws3HX_^Uye0G", "$&xcjZ%#XeN27Z#t2l3grXL1sv5*ZI", "PIGer=Sso3QwwT4baAF2PIAnwK?%-V", "AhV0D?qu?4Za%83y96%MfURfXMh^q_",
			"&H?-b9P@$&8kO^V1r8a1Kjx9*0oPq1", "ZcR8N1MUGV@KJtM+AVFp1D=A|wH=Mf", "_|!UdFJZLZeo9=j?%9-0UDsHY8x6Yv", "ZgmLqzQ5tbP?kyYGVrn1pn2BQ2m40?", "DU?O8q0G+DAgxto5%p70u@AhWkeT3Y",
			"XcT_v6W3F4e%v4Zd|ydDBXL0!%*kcD", "c6NMwg5hfy-ad!g*DmMjZ#Bd3s4ySN", "+F^k&?#UWQJ5OX-f|KI21n7S6aLmt^", "KVq%=VOm?CALgqcaX8u5&+-0M%8apy", "8Kw?r?@5bH5vEQCJ7UJgOijUar9By&",
			"cZaAnlTKoI5knzE1#f65bxg4SjxS_?", "O0jOojTZb3e8Vx3ONUimTMk|UWZwuD", "WXRYq-gr?Q5uWU6bLB2h&ZRecz=M1r", "^3nk80oqQth^c9Z%W4Z&=d0AA94I!^", "tmwgHh03HZjUi16W^803FIU-8_tWaA",
			"&n#^dZZ6sOP*sWI^H&mrlsytU7&@So", "YSFa?z*y|66xd0Fo0gdelXgE7-0**X", "1&?bA$!MK|%D*F9@8qmdpUkijuh+G6", "!Oj0&-I!7=9uYS=YQqQuEb9oM!c=3_", "K3Y4jBjmY+I8#iY4jbng!Ayg=Y609%",
			"c84F2IF2%i1^_h6SQB#qXwRfWJuf=6", "G+KPf_X7uxgcT_kNIjn3RH4!hbdd-a", "iQ20n2az-3a?=lwgiPITbq#sPvoe5|", "1xCK%Xibu6LAvrX1W#nn|39z=3SZ6J", "AnY^h299nk-HJ%f0Y7r_#Nr1XPLe|R",
			"Q^92meumQx0nWAhCuUq?ATfW3Z2feE", "MGJp_Chb_xjz9J^9EnQPg7cr++MN3L", "ZatrKC3XoypYnL1Y#34%VpHg?C5E9U", "VLhj8a0o7_TC+n_m_gk4@1%aVz-ir7", "cUR@_py9wkM59=1MRFJ6!3?0QC9x4$",
			"BFV@wR3#TKkGRO_nzqDUyx6|l0v_yR", "C4$-YMkEA?qF@%P8m$610no?AT9Dvt", "Cz-hS3z31M^@4qJg5T=rlJ*FT1afNf", "Omnb2qto-Td9eb?X67O*qs!|AQLzNG", "$4V31xDJOXFq*IetD?SqHgyrf#ncrp",
			"fhZvvd_Q@i70v5f9y+8WPKJ3L%BuwC", "L6qXK1k%p&xB3e0+Q@_zQX8ISpEFEL", "jS!J=R_083j8DN7Vl!8#dqPe=4LSAX", "Lky2s#utbHr073D2?L&kKLncnpuqB5", "&=sRUHVRc!|=c2MGaskJf|fPYy8ldm",
			"PIb9G4NitzzO6nk0Uz-$#FCBXmco4&", "3rC85#R^NyFfImW2=s7$3h+@ft2^-9", "sA+vo@8=#g4rH6jo!qlWGjnCxeX2l*", "ke8gR5_Ym=C38u&F3sc!7XIXn03h2f", "cTCr$@pRxn2ljp5vR?XV6nLuJ7nPS0",
			"Vw6iSn#Ghw&23tJ%m53BcKD%A6Wqd&", "YjIo5TR%k7ZiI*Vssk=5K*E6GF*yRu", "?UMSaGw#NeH&408ILvqXjPt@DwoFYg", "X*$9EfhwAJZgtB05wxzV!JiaFP*bE!", "Hm&VW+rv316Bd6p2rWZjS7UZd&AqnY",
			"CblsA^+4g8^K0sww$7|9^jQHvMOJ=*", "U%g*fLnF0oiGj6oXWOk1+cr4YffKFx", "#oZT|mNvLtgRS3j14qV_pT-8i78+3O", "heRVTc&JZ53BJN*IBh1_TD_?3=D|Pb", "|slw@bT@Ymk4%^FW0G-CSVTqD2b8ak",
			"mimh#AHh93CNKpV07VuKUN!dEc4@&F", "J&R@egy9yV2ztpej6kGB=F?Ar^Ir9k", "yi+8W33gSB8JiFKAEwGAX%*oE^rb+4", "bM^tw#IF-3^cyI9rVIBdmknroE_6G^", "pJnuD=3IFMdjmL9VC5MX7t?t%b3TBO"
		);

        if (in_array($row['wachtwoord'], $passwordgenny)) {
            header('location: renewpassword.php');
            $_SESSION['renewpassword'] = $row['idmedewerkers'];
        } elseif ($count == 1) {
            $_SESSION['login_user'] = $emaillogin;

            header("location: welcome.php");
        } else {
            $error = "Uw gebruikersnaam of wachtwoord is onjuist.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Login Page</title>

    <style type = "text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }

        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }

        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label for="username">UserName  :</label><input id="username" type = "text" name = "username" class = "box"/><br /><br />
                <label for="password">Password  :</label><input id="password" type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>

</body>
</html>
