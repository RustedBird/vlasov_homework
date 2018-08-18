<?php

class MyUser
{
    protected $name;
    protected $email;
    protected $settings;

    public function __construct($name, $email, Settings $settings)
    {
        $this->name = $name;
        $this->email = $email;
        $this->settings = $settings;
    }

    public function __call($name, $arguments)
    {
        if(method_exists($this->settings, $name))
        {
            return call_user_func_array([$this->settings, $name], $arguments);
        }
    }
}
class Settings
{
    protected $ip = '127.0.01';

    public function getSettings()
    {
        return $this->ip;
    }
}

$user1 = new MyUser('Philipp', 'vlasov@gmail.com', new Settings());

var_dump($user1->getSettings());

class User {

    protected $name;
    protected $timeline = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addTweet(Tweet $tweet)
    {
        $this->timeline[] = $tweet;
    }

}

class Tweet {

    protected $id;
    protected $text;
    protected $read;

    public function __construct($id, $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->read = false;
    }

    public function __invoke($user)
    {
        $user->addTweet($this);
        return $user;
    }

}

$users = array(new User('Ev'), new User('Jack'), new User('Biz'));
$tweet = new Tweet(123, 'Hello world');
$users = array_map($tweet, $users);

var_dump($users);
