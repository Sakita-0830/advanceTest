<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inquiry;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'surname' => '山田',
            'name' => '太郎',
            'sex' => '男性',
            'email' => 'yamadataro@example.com',
            'post' => '111-1111',
            'address' => '東京都渋谷区',
            'building' => '山田ビル101',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、山田です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '窪田',
            'name' => '正孝',
            'sex' => '男性',
            'email' => 'kubotamasataka@example.com',
            'post' => '222-2222',
            'address' => '埼玉県川越市',
            'building' => '窪田ビル202',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、佐藤です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '堀北',
            'name' => '真希',
            'sex' => '女性',
            'email' => 'horikitamaki@example.com',
            'post' => '333-3333',
            'address' => '神奈川県横浜市',
            'building' => '堀北ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、堀北です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '大野',
            'name' => '智',
            'sex' => '男性',
            'email' => 'oonosatoshi@example.com',
            'post' => '333-3333',
            'address' => '東京都目黒区',
            'building' => '大野ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、大野です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '松本',
            'name' => '潤',
            'sex' => '男性',
            'email' => 'matsumotojun@example.com',
            'post' => '333-3333',
            'address' => '東京都目黒区',
            'building' => '松本ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、松本です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '桜井',
            'name' => '翔',
            'sex' => '男性',
            'email' => 'sakuraisyo@example.com',
            'post' => '333-3333',
            'address' => '東京都目黒区',
            'building' => '桜井ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、桜井です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '二宮',
            'name' => '和也',
            'sex' => '男性',
            'email' => 'ninomiyakazunari@example.com',
            'post' => '333-3333',
            'address' => '東京都目黒区',
            'building' => '二宮ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、二宮です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);

        $param = [
            'surname' => '相葉',
            'name' => '雅紀',
            'sex' => '男性',
            'email' => 'aibamasaki@example.com',
            'post' => '333-3333',
            'address' => '東京都目黒区',
            'building' => '相葉ビル303',
            'opinion' => 'お世話になっております。先日、貴社製品を購入させていただきました、相葉です。不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せばいいかご教授いただきたいです。'
        ];
        Inquiry::create($param);
    }
}
