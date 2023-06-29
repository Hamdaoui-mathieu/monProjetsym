<?php
use Symfony\Component\HttpFoundation\RequestStack;

class PanierService
{
    private $requestStack;
    public function __construct(RequestStack $requestStack)
{
    $this->requestStack=$requestStack;
}

}