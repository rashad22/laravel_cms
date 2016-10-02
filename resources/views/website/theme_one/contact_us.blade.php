@extends('website.theme_one.layout')
@section('content')
<div class="contact-us-container">
    <?php
    $site_name = isset($GLOBALS['theme_options'][0]['meta_value']) ? $GLOBALS['theme_options'][0]['meta_value'] : 'Demo Site';
    $site_email = isset($GLOBALS['theme_options'][1]['meta_value']) ? $GLOBALS['theme_options'][1]['meta_value'] : 'rashed@versatileitbd.com';
    $site_contact = isset($GLOBALS['theme_options'][2]['meta_value']) ? $GLOBALS['theme_options'][2]['meta_value'] : '+880 xx xx xx xx';
    $site_address = isset($GLOBALS['theme_options'][3]['meta_value']) ? $GLOBALS['theme_options'][3]['meta_value'] : 'versatileitbd Narda Dhaka-1212';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 contact-form wow fadeInLeft">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <a href="">suscipit lobortis</a>
                    nisl ut aliquip ex ea commodo consequat.
                </p>
                <form role="form" action="assets/sendmail.php" method="post">
                    <div class="form-group">
                        <label for="contact-name">Name</label>
                        <input type="text" name="name" placeholder="Enter your name..." class="contact-name" id="contact-name">
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Email</label>
                        <input type="text" name="email" placeholder="Enter your email..." class="contact-email" id="contact-email">
                    </div>
                    <div class="form-group">
                        <label for="contact-subject">Subject</label>
                        <input type="text" name="subject" placeholder="Your subject..." class="contact-subject" id="contact-subject">
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Message</label>
                        <textarea name="message" placeholder="Your message..." class="contact-message" id="contact-message"></textarea>
                    </div>
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>
            <div class="col-sm-5 contact-address wow fadeInUp">
                <h3>We Are Here</h3>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.14082494235606!2d90.42088751718971!3d23.809593761382924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3bbf8a0b8735d2f9!2sSonali+Bank+Limited!5e0!3m2!1sen!2sbd!4v1475418095136" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <h3>Address</h3>
                <p>{{$site_address==''?'No Address':$site_address}}</p>
                <p>Phone: {{$site_contact}}</p>
                <p>E-mail  <a href="mailto:{{$site_email}}">{{$site_email}}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection