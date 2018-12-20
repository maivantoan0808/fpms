<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listUserId = \App\Models\User::pluck('id');
        $listPositionId = \App\Models\Position::pluck('id');

        factory(App\Models\Project::class, 50)->create()
            ->each(function ($project) use ($listUserId, $listPositionId) {
                $project->users()->attach($listUserId->random(), [
                    'position_id' => $listPositionId->random()
                ]);
            }
        );
    }
}
