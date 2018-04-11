<?php

class Event {
    protected $listeners = [];

    public function register($name, $closure, $priority=0) {
        log_message('debug', 'event::register::'.$name);

        $this->listeners[$name][$priority][] = $closure;
        
        return $this;
    }

    public function trigger($name,&$a=null,&$b=null,&$c=null,&$d=null,&$e=null,&$f=null,&$g=null,&$h=null) {
        log_message('debug', 'event::trigger::'.$name);

        if ($this->has_event($name)) {
            $events = $this->listeners[$name];

            ksort($events);

            foreach ($events as $priority) {
                foreach ($priority as $event) {

                    $event($a,$b,$c,$d,$e,$f,$g,$h);
                }
            }
        }
        
        return $this;
    }

    public function has_event($name) {
        return (isset($this->listeners[$name]) && count($this->listeners[$name]) > 0);
    }

    public function events() {
        return array_keys($this->listeners);
    }
    
    public function clear() {
        $this->listeners = [];

        return $this;
    }

} 