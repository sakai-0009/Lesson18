<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('posts')->insert([

['contents' => '秋の田のかりほの庵の苫を荒みわがころも手は露に濡れつつ',
'user_name' => '天智天皇',],

['contents' => '春すぎて夏来にけらし白たへのころもほすてふあまの香具山',
'user_name' => '持統天皇',],

['contents' => 'あしびきの山鳥の尾のしだり尾のながながし夜をひとりかも寝む',
'user_name' => '柿本人麻呂',],

['contents' => '田子の浦にうちいでて見れば白たへの富士の高嶺に雪は降りつつ',
'user_name' => '山部赤人',],

['contents' => '奥山にもみぢ踏み分け鳴く鹿の声聞く時ぞ秋は悲しき',
'user_name' => '猿丸太夫',]

]);

    }
}
