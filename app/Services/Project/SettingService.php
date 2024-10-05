<?php


namespace App\Services\Project;
use App\Services\MainService;
use App\Models\Project\Setting;

class SettingService extends MainService
{
    public function __construct(Setting $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/setting/';
        $this->files = ['logo_header','logo_footer','favicon'];
    }
}
