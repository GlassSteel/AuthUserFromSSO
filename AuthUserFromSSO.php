<?php
namespace glasteel;

class AuthUserFromSSO
{
    protected $authorized = null;
    protected $user;
    protected $settings;

    public function __construct($settings = []){
        //are these settings needed?
        if( is_array($settings) ){
            $this->settings = $settings;
        }
    }

    public function setUser(){
        
        if ( $this->authorized !== null ){
            return $this->authorized;
        }

        switch ($_ENV['MODE']) { //do we need this switch?
            case 'local':
                //TODO grab PID from $_ENV
                $user = new \stdclass;
                $user->name = 'Paul';
                $this->user = $user;
                $this->authorized = true;
                return; 
            break;

            case 'development':
                //TODO grab PID from $_SERVER
                # code...
            break;

            case 'production':
                //TODO grab PID from $_SERVER
                # code...
            break;
            
            default:
                die();//dotenv should catch this first
        }
    }

        //global $app;
        
        // switch ($app->settings['SLIM_MODE']){
        //     case 'local':
        //         $pid = 714623825; //TODO mechanism to set spoof pid
        //         $user = \R::findOne('user','unc_pid = :unc_pid',[
        //             'unc_pid' => $pid
        //         ]);
        //         break;   

        //     //TODO development case

        //     //TODO production case

        //     default:
        //         die();//TODO improve error handling
        // }

        // $user = new stdclass;
        // $user->name = 'Paul';
        // $this->auth = $user;
        // return true;

        // if ( $user && $user->id ){
        //     try {
        //         $this->auth = new User($user);
        //     } catch (Exception $e) {
        //         pre_r($e->getMessage());   
        //     }
        //     return true;
        // }
        // $this->auth = false;
        // return false;
    //}

    public function __get($key){
        if( $this->authorized !== true ){
            return false;
        }
        if( is_object($this->user) && property_exists($this->user, $key) ){
            return $this->user->$key;
        }
    }

}//class AuthUserFromSSO