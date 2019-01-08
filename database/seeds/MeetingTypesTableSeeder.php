<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MeetingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meeting_types')->insert([
            'name' => 'Plan Meeting',
            'description' => 'Trình bày mục tiêu và các công việc cần làm trong sprint',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('meeting_types')->insert([
            'name' => 'Retrospective Meeting',
            'description' => 'Phản ánh các sprint, project, milestone gần đây nhất và xác định các khía cạnh cần được cải tiến và tuyên dương team chiến thắng.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('meeting_types')->insert([
            'name' => 'Review Meeting',
            'description' => 'Scrum Team trình bày và chứng minh sự gia tăng sản phẩm. Scrum Team và các bên liên quan tham gia cuộc họp. Scrum Team nhận được phản hồi từ các bên liên quan. Các phản hồi được lưu ý và chúng sẽ sử dụng làm hướng dẫn cho bước tiếp theo. ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('meeting_types')->insert([
            'name' => 'Other Meeting',
            'description' => 'Cuộc họp hàng ngày của nhóm phát triển. Các cuộc họp thường được thiết lập tại cùng một địa điểm và cùng thời điểm ở phía trước Scrum Board mỗi ngày vào buổi sáng. Nhóm đánh giá tiến độ cho sprint, lập kế hoạch cho 24 giờ tiếp theo, đồng bộ hóa các hoạt động, xác định những trở ngại và hành động.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
