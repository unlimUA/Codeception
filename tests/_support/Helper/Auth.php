<?php
namespace Helper;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Auth extends \Codeception\Module
{
    const email = 'a@techgroup.me';
    const password = '12345678';
    const station_name = 'alternative';

    protected $token;



    public function _before($t)
    {
        $I = $this->getModule('REST');
        $I->haveHttpHeader('Content-Type', 'application/json');
        if ($this->token) {
            $this->debugSection('Token', $this->token);
            $I->amBearerAuthenticated($this->token);
            return;
        }
        $I->sendPOST("/auth/login", [
            'email' => Auth::email,
            'password' => Auth::password,
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $tok = $I->grabDataFromResponseByJsonPath('$..token');
        $t = serialize($tok);
        $token = substr("$t",15,-2);

        $a = file_put_contents(codecept_output_dir('token.json'),$tok);
        $this->debugSection('New Token', $tok);
        $I->amBearerAuthenticated($token);
        $this->token = $token;
    }
    public function getToken()
    {
        $token = file_get_contents(codecept_output_dir('token.json'));
        return $token;
    }
    function cleanToken()
    {
        $this->token = null;
    }

    function getSlug()
    {
        $sl = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..slug');
 //       $s = serialize($sl);
//        $slug = substr("$s",6,-2);
        $this->debugSection('Slug', $sl);
        $s = file_put_contents(codecept_output_dir('slug.json'),$sl);
        return $sl;

    }
    function takeSlug()
    {
        $slug = file_get_contents(codecept_output_dir('slug.json'));
        return $slug;
    }

    function getStationId()
    {
        $st_id = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..id');
        $stat_id = serialize($st_id[0]);
        $station_id = substr("$stat_id",5,-2);
        $this->debugSection('Station ID', $st_id);
        $st = $s = file_put_contents(codecept_output_dir('station_id.json'),$st_id);
        return $station_id;

    }
    function takeStationId()
    {
        $station_id = file_get_contents(codecept_output_dir('station_id.json'));
        return $station_id;
    }
    function getCurrentTrack()
    {
        $c_tr = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..currentTrack');
        $cur_tr = serialize($c_tr);
        $current_track = substr("$cur_tr",15,-3);
        $this->debugSection('Current track', $c_tr);
        $c = file_put_contents(codecept_output_dir('currentTrack.json'),$c_tr);
        return $current_track;

    }
    function takeCurrentTrack()
    {
        $current_track = file_get_contents(codecept_output_dir('currentTrack.json'));
        return $current_track;
    }
    function getSongUrl()
    {
        $c_tr = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..data.currentTrack');
        $cur_tr = serialize($c_tr);
        $current_track = substr("$cur_tr",15,-3);
//        $this->debugSection('Current track', $current_track);
        $track = str_replace(" ","%20",$current_track);
        $song_url = str_replace("-","+",$track);
        $this->debugSection('Song URL', $song_url);
        return $song_url;
    }

    function getStation()
    {
        $st = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..station_id');
        $stat = serialize($st);
        $station = substr("$stat",14,-3);
        $this->debugSection('Station', $st);
        $s = file_put_contents(codecept_output_dir('station.json'),$st[1]);
    }
    function takeStation()
    {
        $station = file_get_contents(codecept_output_dir('station.json'));
        return $station;
    }

    function getFavoriteStation()
    {
        $st1 = $this->getModule('REST')->grabDataFromResponseByJsonPath('$..station_id'); #[] выбор массива
        $stat1 = serialize($st1);
        $favorite_station = substr("$stat1",14,-3);
        $this->debugSection('FavoriteStation', $st1);
        $f = file_put_contents(codecept_output_dir('Fstation.json'),$st1);
    }






}


