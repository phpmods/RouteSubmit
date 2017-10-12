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

            $this->render('routesubmit/routesubmit_mainform.php');
            
        }
        
        protected function ShowForm()
	    {
                //Google reCaptcha
                //updated to Google noCaptcha 1/15
                $this->set('sitekey', "RECAPTCHA_PUBLIC_KEY");
                $this->set('lang', 'pt');
                
	    }
	    
        
        public function SendEmail()
        {
            $name = $this->post->name;
            $email_to = $this->post->email;
            $depp = $this->post->depp;
            $arr = $this->post->arr;
            $route = $this->post->route;
            $Aircraft = $this->post->Aircraft;
            $fl = $this->post->fl;
            $dtime = $this->post->dtime;
            $atime = $this->post->atime;
            $ftime = $this->post->ftime;
            $message = "From: $name \n 
                        Depp: $depp \n 
                        Arr: $arr \n 
                        Route: $route \n 
                        Aircraft: $aircraft \n 
                        Fl: $fl \n 
                        Dtime: $dtime \n 
                        Atime: $atime \n 
                        Ftime: $ftime \n";
                        
            $email = "MyEMAIL";
            $subject = "Pilot Submitted Route";
            $headers = "From: $email_to \r\n";
            Util::SendEmail($email, $subject, $message, $headers);
		echo "Your mail has been sent successfuly ! Thank you for your route submit";
        }
		
}
