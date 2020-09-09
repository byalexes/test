<?php

class First
{
    public function getClassname()
    {
        return get_class($this);
    }

    public function getLetter()
    {
        return "A";
    }
}

class Second extends First
{
    public function getLetter()
    {
        return "B";
    }
}