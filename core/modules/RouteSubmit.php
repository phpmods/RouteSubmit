<?php

    class RouteSubmit extends CodonModule
    {
        public function index()
        {
            require_once CORE_LIB_PATH.'/recaptcha/recaptchalib.php';
            $this->set('title', 'Add Schedule');


            $this->set('allairlines', OperationsData::GetAllAirlines());
            $this->set('allaircraft', OperationsData::GetAllAircraft());
            $this->set('allairports', OperationsData::GetAllAirports());
            //$this->set('airport_json_list', OperationsData::getAllAirportsJSON());
            $this->set('flighttypes', Config::Get('FLIGHT_TYPES'));
            
            if(isset($_POST['submit'])) {
			$this->SendEmail();
		    } else {
		        $this->ShowForm();
		    }

            $this->render('routesubmit/RouteSubmit.php');
            
        }
        
        protected function ShowForm()
	    {
                //Google reCaptcha
                //updated to Google noCaptcha 1/15
                $this->set('sitekey', RECAPTCHA_PUBLIC_KEY);
                $this->set('lang', 'en');

	    }

        
        public function SendEmail()
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $depp = $_POST['depp'];
            $arr = $_POST['arr'];
            $route = $_POST['route'];
            $aircraft = $_POST['Aircraft'];
            $fl = $_POST['fl'];
            $dtime = $_POST['dtime'];
            $atime = $_POST['atime'];
            $ftime = $_POST['ftime'];
            $message = "From: $name \n 
                        Depp: $depp \n 
                        Arr: $arr \n 
                        Route: $route \n 
                        Aircraft: $aircraft \n 
                        Fl: $fl \n 
                        Dtime: $dtime \n 
                        Atime: $atime \n 
                        Ftime: $ftime \n";
                        
            $email_to = "cadu@f72.com.br";
            $subject = "Pilot Submitted Route";
            $headers = "From: $email \r\n";
            Util::SendEmail($email_to, $subject, $message, $mailheader);
           echo "Thank You!"." -"."<a href='http://teste-ccbsvirtual.000webhostapp.com/index.php' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
        }
		
}