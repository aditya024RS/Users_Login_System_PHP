<?php 
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adibook</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/signup.css">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <main class="signup-section-main">
        <div class="wrapper-main signup-container">
                <h1>adibook</h1>
                <div class="signup-form">
                    <h2>Create a new account</h2>
                    <p>It's quick and easy.</p>
                    <form action="includes/signup.inc.php" method="POST">
                        
                        <?php signup_inputs(); ?>

                        <div class="signup-form-div2">
                            <p>Date of birth?</p>
                            <select name="DOBday" id="DOBday">
                                <option value="00">DD</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>

                            <select name="DOBmonth" id="DOBmonth">
                                <option value="00">MM</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>

                            <select name="DOByear" id="DOByear">
                                <option value="0000">YYYY</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                            </select>
                        </div>

                            <div class="signup-form-div3">
                                <p>Gender?</p>

                                <input type="hidden" name="gender" value="">

                                <div class="div3-div">Female
                                <input type="radio" name="gender" id="gender-female" value="Female"></div>
                                
                                <div class="div3-div">Male
                                <input type="radio" name="gender" id="gender-male" value="Male"></div>
                                
                                <div class="div3-div">Others
                                <input type="radio" name="gender" id="gender-others" value="Others"></div>
                                
                            </div>

                        <p>People who use our service may have uploaded your contact information to Adibook. <a href="#">Learn more</a></p>
                        <p>By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Privacy Policy</a> and <a href="#">Cookies Policy</a>. You may receive SMS notifications from us and can opt out at any time.</p>
                        <button type="submit">Sign Up</button>
                        
                            <?php check_signup_errors(); ?>  

                    </form>
                    
                    <a href="index.php" class="log-in">Already have an account?</a>
                </div>
        </div>
    </main>

    

    <?php include 'partials/footer.php';?>
</body>
</html>