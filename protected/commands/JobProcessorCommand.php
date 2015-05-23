<?php

class JobProcessorCommand extends CConsoleCommand {

    private function getJobs() {
        return ScheduledJob::model()->active()->current()->findAll();
    }

    public function run($args) {
        $jobs = $this->getJobs();
        foreach ($jobs as $job) {
            Yii::log("Running - Job [" . $job->job->name .
                    "] Action [" . $job->job->action .
                    "] Parameters [" . $job->params .
                    "] scheduled for " . $job->scheduled_time, 'info', 'jobprocessor');
            $name = $job->job->action;
            $job->started = new CDbExpression('NOW()');
            $job->save();
            $job->output = json_encode($this->$name
                            ($job->params));
            $job->completed = new CDbExpression('NOW()');
            $job->save();
        }
    }

}

?>
