<?php

namespace framework\libs;

class router {

    private $request;

    public function __construct(request $request) {
        $this->request = $request;
    }

    public function Dispatch(bController $bController) {
        if (!is_null($this->request->getmodule())) {
            $iController = $bController::loadC($this->request->getcontroller(), $this->request->getmodule());
        } else {
            $iController = $bController::loadC($this->request->getcontroller());
        }

        if (method_exists($iController, $this->request->getaction())) {
            $iController->{$this->request->getaction()}($this->request->getparams());
        } else {
            throw new \Exception("the action doesn't exist .");
        }
    }

}

?>
