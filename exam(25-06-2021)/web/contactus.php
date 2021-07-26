<?php include 'header.php';?>
<!--===================== End Header ===================-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
<script>
    $(document).ready(function (e) {
        $("#dataform").on('submit',(function(e) {
                $("#btnsubmit").hide(); 
                e.preventDefault();
                $.ajax({
                    url: "web-api/contct/contct.php",
                    type: "POST",
                    dataType:"JSON",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        //console.log(data)
                        $("#btnsubmit").show(); 
                        //$("#loading").hide();
                        if(data.status == '200')
                        {
    						Swal.fire(
                                'Successfully Submitted.',
                                'Thankyou for Contacting Us..!',
                                'success'
                        	)
                            $("#dataform")[0].reset();
                        }
                        else
                        { 	
                            alert('error')
                        }
                    },
                    error: function(e) 
                    {
                    // $("#err").html("Some thing went  wrong").fadeIn().style.color.red;
                    }          
                });
            }
        }));
    });
</script>
<section id="course-sg" style="background-image: url(assets/img/bank-po.jpg);" class="back-bg">
<div class="container">
    <div class="contact-text">
       <h1>Contact Us</h1>
    </div>
</div>
<div class="over-contact"></div>
   
</section>

<!-- ==================== COURS content======================= -->

<section id="adress-con">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="addtes-text">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="phone-text">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:" >+91 0123456789</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="phone-text">
                   <i class="fa fa-envelope" aria-hidden="true"></i>
                   <a href="mailto:">test@gmail.com</a>
                 </div>
            </div>
        </div>
    </div>
</section>
  
<section id="contact-map">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="contact-form-s">
    				<form id="dataform" method="post">
                        <div class="form-mid-to">
                            <div class="form-mid-left">
                                <div class="form-group">
                                    <input type="text" name="contactName" id="contactName" class="form-control" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-mid-to">
                            <div class="form-mid-left">
                                <div class="form-group">
                                    <input type="email" name="contactEmail" id="contactEmail" class="form-control" placeholder="Email">
                                </div>                                                        
                            </div>
                        </div>
                        <div class="form-mid-to">
                            <div class="form-mid-left">
                                <div class="form-group">  
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                </div>   
                            </div>
                        </div>
                        <div class="form-mid-to">
                            <div class="form-mid-left">
                                <div class="form-group">  
                                    <textarea placeholder="Message" name="message" id="message"></textarea>
                                </div>   
                            </div>
                        </div>
                        <input type="submit" class="btn btn-send" id="btnsubmit" value="Submit">
                    </form>
                </div>
            </div> 
            <div class="col-md-6 col-sm-12">
                <div class="map-cl">                
                    <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d113980.29145495666!2d75.7564525!3d26.7799639!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x396dc9f6e67b2e39%3A0xaf4cf1f8e4cc6168!2sRoyal%20Guest%20House!3m2!1d26.7799811!2d75.8264928!5e0!3m2!1sen!2sin!4v1617061733679!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>      
        </div>      
    </div>
</section>

<!-- =============================================== Validation Start -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
    var $dataform = $("#dataform");
    if ($dataform.length) {
        $dataform.validate({
            rules: {
                contactName: {
                    required: true,
                },
                contactEmail: {
                    required: true,
                    email: true,
                },
                subject: {
                    required:true,
                },
                message: {
                    required: true,
                },
            },
            messages: {
                contactName: "Name is Required.",
                contactEmail: "Email Address is Required.",
                subject: {
                    required: "Subject is Required.",
                },
                message: {
                    required: "Message is Required.",
                },
            },
        });
    }     
</script>
<!-- =============================================== Validation End -->
  
<!-- ======= Footer ======= -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'footer.php';?>