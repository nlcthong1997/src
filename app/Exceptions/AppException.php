<?php

namespace App\Exceptions;

use Exception;

class AppException extends Exception
{
    protected $message;
    protected $data;
    protected $code;
    protected $statusCode;

    protected $redirectTo = null;

    const DEFAULT_MESSAGE = 'The app return none message!';
    const DEFAULT_CODE = 'ERROR';
    const DEFAULT_STATUS_CODE = 400;
    const DEFAULT_DATA = null;

    /**
     * $messageOrException is values:
     * string
     * array
     * Exception
     */
    public function __construct($messageOrException = null, $data = null, $code = '', $statusCode = null)
    {
        if (is_array($messageOrException) || is_null($messageOrException)) {
            $this->message = collect($messageOrException);
        } else {
            if ($messageOrException instanceof Exception) {
                $mess = $messageOrException->getMessage();
            } elseif (is_string($messageOrException)) {
                $mess = $messageOrException;
            } else {
                $mess = self::DEFAULT_MESSAGE;
            }
            $this->message = collect(['message' => $mess]);
        }
        $this->data = $data;
        $this->code = $code;
        $this->statusCode = $statusCode;
    }

    /**
     * 
     */
    private function getCustomMessage()
    {
        if (!empty($this->message) && !$this->message->isEmpty()) {
            return $this->message;
        }
        return $this->getMessageDefault();
    }

    /**
     * 
     */
    private function getData()
    {
        if (!empty($this->data)) {
            return $this->data;
        }
        return $this->getDataDefault();
    }

    /**
     * 
     */
    private function getCustomeCode()
    {
        if (!empty($this->code)) {
            return $this->code;
        }
        return $this->getCodeDefault();
    }

    /**
     * 
     */
    private function getStatusCode()
    {
        if (!empty($this->statusCode)) {
            return $this->statusCode;
        }
        return $this->getStatusCodeDefault();
    }

    /**
     * 
     */
    public function getMessageDefault()
    {
        return self::DEFAULT_MESSAGE;
    }

    /**
     * 
     */
    public function getDataDefault()
    {
        return self::DEFAULT_DATA;
    }


    /**
     * 
     */
    public function getCodeDefault()
    {
        return self::DEFAULT_CODE;
    }

    /**
     * 
     */
    public function getStatusCodeDefault()
    {
        return self::DEFAULT_STATUS_CODE;
    }

    /**
     * 
     */
    public function render($request)
    {
        $errMess = !empty($this->getCustomMessage()['message'])
            ? $this->getCustomMessage()['message']
            : $this->getCustomMessage();

        if ($request->is('api/*') || $request->ajax()) {
            // api|ajax
            return response()->jsonError(
                is_string($errMess) ? ['system_mess' => [$errMess]] : $errMess, 
                $this->getData(), 
                $this->getCustomeCode(), 
                0, 
                $this->getStatusCode()
            );
        } else {
            // web|view
            if (!empty($this->redirectTo) && is_string($this->redirectTo)) {
                return $this->renderRedirect($errMess);
            }
            return $this->renderBack($errMess);
        }
    }

    /**
     * render view
     */
    private function renderBack($errMess)
    {
        if (!empty($this->data)) {
            return back()->withInput()->with([
                'error' => $errMess,
                'data' => $this->getData()
            ]);
        }
        return back()->withInput()->with('error', $errMess);
    }

    /**
     * render view
     */
    private function renderRedirect($errMess)
    {
        if (!empty($this->data)) {
            return redirect($this->redirectTo)->withInput()->with([
                'error' => $errMess,
                'data' => $this->getData()
            ]);
        }
        return redirect($this->redirectTo)->withInput()->with('error', $errMess);
    }
}

