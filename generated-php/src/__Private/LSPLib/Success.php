<?php
namespace Facebook\HHAST\__Private\LSPLib;

final class Success extends SuccessOrError
{
    /**
     * @var TResult
     */
    private $result;
    /**
     * @var TResult
     */
    public function __construct(TResult $result);
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }
    /**
     * @return TResult
     */
    public function getResult()
    {
        return $this->result;
    }
    /**
     * @return Error<TResultFacebook\HHAST\__Private\LSPLib\TErrorCodeFacebook\HHAST\__Private\LSPLib\TErrorData>
     */
    public function getError()
    {
        invariant_violation('%s should not be called on %s', __METHOD__, __CLASS__);
    }
}

