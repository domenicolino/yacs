<?php
namespace Lino\Yacs\Core\Libs;

use Lino\Yacs\Core\YacsException;

class Answer {
    const VAL_STATUS_SUCCESS = "OK";
    const VAL_STATUS_ERROR = "ERROR";

    protected $answer = false;
    protected $exception = false;
    protected $errorCode = null;
    protected $message = null;
    public function setError(YacsException $e) {
        $this->status = self::VAL_STATUS_ERROR;
        $this->exception = $e;
    }

    public function getErrorCode() {
        return $this->exception ? $this->exception->getErrorCode(): null;
    }

    public function getErrorMessage() {
        return $this->exception ? $this->exception->getMessage() : null;
    }

    public function getError() {
        return $this->exception;
    }

    public function isSuccess() {
        return ($this->status == self::VAL_STATUS_SUCCESS);
    }
    public function setSuccess($message = self::VAL_STATUS_SUCCESS) {
        $this->status = self::VAL_STATUS_SUCCESS;
        $this->message = $message;
    }

    public function getAnswer() {
        $answer = '{status:' . $this->status . ',message:';
        if ($this->status == self::VAL_STATUS_SUCCESS) {
            $answer .=  $this->message;
        }

        if ($this->status == self::VAL_STATUS_ERROR) {
            $answer .= $this->getErrorMessage() . ',code:' . $this->getErrorCode();
        }

        $answer .= '}';
        return $answer;
    }

    public function __toString() {
        return $this->getAnswer();
    }



}