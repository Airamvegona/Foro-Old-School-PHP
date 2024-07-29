<?php
final class ProfileController extends SessionController
{
    public function __construct()
    {
        parent::__construct();
        $this->requireModel(['profile', 'answer', 'user']); // Asegúrate de cargar el modelo de usuario
    }
    

function index()
    {
        $profiles = $this->getProfilesAll();
        $getProfilesAll = [];

        foreach ($profiles as $profile) {
            $profile['usuario'] = $this->getUser($profile['usuario']);
            $profile['respuestas'] = $this->countAnswers($profile['id']);
            array_push($getProfilesAll, $profile);
        }

        $this->view->render('profile', ['user' => $this->user, 'profiles' => $getProfilesAll]);
    }

    function info($params)
    {
        $profile =  $this->getProfilesAll($params[0]);
        if (!$profile) {
            $this->redirect('profile');
        } else {
            $this->view->render('profile/info/', ['user' => $this->user, 'profile' => $profile]);
        }
    }
    function newprofile()
    {
        $title = $this->getPost('title');
        $content = $this->getPost('content');

        if (empty($title) && empty($content)) {
            $this->redirect('profile');
            return;
        }

        $profile = new ProfileModel();
        $profile->setTitle($title);
        $profile->setContent($content);
        $profile->setUserId($this->user->getId());
        $id = $profile->save();
        if ($id != false) {
            $this->redirect('profile/info/' . $id);
        }
    

    }
    public function deleteAnswer($answerId)
    {
        $answerId = $answerId[0];
        $answer = new AnswerModel();
        $answer->getById($answerId);
        $profileId = $answer->getthreadId();

        if ($answer->delete($answerId)) {
            $this->redirect('thread/info/' . $profileId,);
        }
    }


    private function getProfileAllInfo($profileId)
    {
        $profileObj = new ProfileModel();
        if(!$profileObj->getById($profileId)){
            return null;
        }
        $profile = $profileObj->getById($profileId)->toArray();
        $profile['usuario'] = $this->getUser($profile['usuario']);
        $profile['respuestas'] = $this->getAnswersByProfileId($profile['id']);

        return $profile;
    }

    private function getProfilesAll($n = 10)
    {
        $profile = new ProfileModel();
        return $profile->getProfilesByUserId($this->user->getId(), $n, true);
    }

    private function getUser($userId)
    {
        $user = new UserModel();
        $user->getById($userId);
        $userInfo = [];
        $userInfo['id'] = $user->getId();
        $userInfo['usuario'] = $user->getUsername();

        return $userInfo;
    }

    private function countAnswers($profileId)
    {
        $answer = new AnswerModel();
        return $answer->countAnswersBythreadId($profileId);
    }

    private function getAnswersByProfileId($profileId)
    {
        $answerObj = new AnswerModel();
        $answers = $answerObj->getAllBythreadId($profileId, true);
        if (!$answers) {
            return null;
        }
        $answersAllInfo = [];

        foreach ($answers as $answer) {
            $answer['usuario'] = $this->getUser($answer['usuario']);
            array_push($answersAllInfo, $answer);
        }
        return $answersAllInfo;
    }
}
