<?php

class ratingController extends Controller {

    public function ratingAction() {
        if (isset($this->param['type']) && isset($this->param['id'])) { //Если рейтинг открыт правильно
            $this->voice_id = $this->param['id'];
            $this->voice_type = $this->param['type'];
            Lavra_Loader::LoadModels("Rating", "rating");
            $rating = new Rating();
            if ($rating->isVoice($this->param['type'], $this->param['id'])) { //Если уже голосовали
                $this->isVoice = 1; //Если голосовали
            } else { //Если не голосовали
                $this->isVoice = 0; //Если не голосовали
                if (isset($this->param['voice'])) { //Если послан голос
                    $rating->add($this->param['type'], $this->param['id'], $this->param['voice']);
                    $this->isVoice = 1; //Если голосовали
                }
            }
            $this->voices = $rating->getRatingVoiceId($this->param['type'], $this->param['id']);
        }
    }

}