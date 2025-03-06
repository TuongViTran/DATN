<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed bảng user
        DB::table('user')->insert([
            [
                
                'full_name' => 'Từ Ngọc Minh',
                'email' => 'tungocminh18@gmail.com',
                'password' => bcrypt('minh123'),
                'phone' => '0905123456',
                'avatar_url' => null,
                'account_type' => 'user',
                'created_at' => now(),
            ],
            [
                
                'full_name' => 'Trần Nguyễn Tường Vi',
                'email' => 'tuongvitran123@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '0905234567',
                'avatar_url' => null,
                'account_type' => 'admin',
                'created_at' => now(),
            ],

            [
                
                'full_name' => 'Nguyễn Minh Nhật',
                'email' => 'nhatnguyen123@gmail.com',
                'password' => bcrypt('nhat1234'),
                'phone' => '0905234567',
                'avatar_url' => null,
                'account_type' => 'owner',
                'created_at' => now(),
            ],
        ]);

        // 2. Seed bảng social_network
        DB::table('social_network')->insert([
            [ 'platform' => 'Facebook', 'url' => 'https://www.facebook.com/', 'created_at' => now()],
            [ 'platform' => 'Instagram', 'url' => 'https://www.instagram.com/', 'created_at' => now()],
        ]);

        // 3. Seed bảng styles
        DB::table('styles')->insert([
            ['style_name' => 'Modern', 'description' => 'Phong cách hiện đại', 'created_at' => now()],
            ['style_name' => 'Vintage', 'description' => 'Phong cách cổ điển', 'created_at' => now()],
        ]);

        // 4. Seed bảng addresses
        DB::table('addresses')->insert([
            ['street' => '12 Lê Lợi', 'district' => 'Hải Châu', 'city' => 'Đà Nẵng', 'country' => 'Vietnam', 'created_at' => now()],
            ['street' => '34 Nguyễn Huệ', 'district' => 'Quận 1', 'city' => 'HCM', 'country' => 'Vietnam', 'created_at' => now()],
        ]);

        // 5. Seed bảng coffeeshop
        DB::table('coffeeshop')->insert([
            [
                'shop_name' => 'Coffee House A',
                'phone' => '0905456789',
                'user_id' => 3,
                'description' => 'Không gian thoáng mát, yên tĩnh',
                'address_id' => 1,
                'status' => 'open',
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
                'parking' => 'Có',
                'wifi_password' => 'coffee123',
                'hotline' => '19001000',
                'rating' => 4.5,
                'likes' => 120,
                'average_price' => 50000.00,
                'styles_id' => 1,
                'social_network_id' => 1,
                'created_at' => now(),
            ],
            [
                'shop_name' => 'Vintage Coffee',
                'phone' => '0905111222',
                'user_id' => 2,
                'description' => 'Không gian cổ điển, yên tĩnh',
                'address_id' => 2,
                'status' => 'closed',
                'opening_time' => '07:00:00',
                'closing_time' => '23:00:00',
                'parking' => 'Có',
                'wifi_password' => 'vintage456',
                'hotline' => '19001111',
                'rating' => 4.8,
                'likes' => 300,
                'average_price' => 60000.00,
                'styles_id' => 2,
                'social_network_id' => 2,
                'created_at' => now(),
            ],
        ]);

        DB::table('menu')->insert([
            ['shop_id' => 1, 'item_name' => 'Cà phê đen', 'image_url' => null, 'price' => 25000, 'description' => 'Cà phê nguyên chất, đậm đà hương vị.', 'status' => 'Available', 'created_at' => now(), 'updated_at' => now()],
            ['shop_id' => 2, 'item_name' => 'Trà sữa truyền thống', 'image_url' => null, 'price' => 35000, 'description' => 'Trà sữa thơm ngon, kết hợp trân châu dai giòn.', 'status' => 'Available', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('event')->insert([
            ['shop_id' => 1, 'event_name' => 'Đêm nhạc Acoustic', 'description' => 'Thưởng thức âm nhạc sống động với ban nhạc trẻ.', 'event_date' => now()->addDays(5), 'location' => 'Cà Phê Sáng', 'created_at' => now(), 'updated_at' => now()],
            ['shop_id' => 2, 'event_name' => 'Workshop Pha Chế', 'description' => 'Học cách pha chế cà phê chuyên nghiệp.', 'event_date' => now()->addDays(10), 'location' => 'Cafe Phố', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('tablereservation')->insert([
            ['user_id' => 1, 'shop_id' => 1, 'event_id' => 1, 'number_of_people' => 2, 'reservation_time' => now()->addDays(5), 'table_location' => 'Góc nhỏ', 'special_request' => 'Không', 'price' => 50000, 'status' => 'Confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'shop_id' => 2, 'event_id' => 2, 'number_of_people' => 4, 'reservation_time' => now()->addDays(10), 'table_location' => 'Góc yên tĩnh', 'special_request' => 'Không', 'price' => 70000, 'status' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('review')->insert([
            ['user_id' => 1, 'shop_id' => 1, 'rating' => 5, 'content' => 'Quán đẹp, nhân viên thân thiện.','img_url'=>'https://example.com/images/cafe_pho_1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'shop_id' => 2, 'rating' => 4, 'content' => 'Không gian quán đẹp, giá cả hợp lý.','img_url'=>'https://example.com/images/cafe_pho_2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('shopimage')->insert([
            ['shop_id' => 1, 'image_url' => 'https://example.com/images/caphe_sang_1.jpg', 'description' => 'Mặt tiền quán Cà Phê Sáng', 'uploaded_at' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['shop_id' => 2, 'image_url' => 'https://example.com/images/cafe_pho_1.jpg', 'description' => 'Góc check-in đẹp tại Cafe Phố', 'uploaded_at' => now(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('promotion')->insert([
            ['shop_id' => 1, 'title' => 'Giảm 20% cho sinh viên', 'description' => 'Ưu đãi đặc biệt cho sinh viên khi mang theo thẻ.', 'discount_percent' => 20.00, 'discount_amount' => 10000, 'start_date' => now(), 'end_date' => now()->addDays(7), 'created_at' => now(), 'updated_at' => now()],
            ['shop_id' => 2, 'title' => 'Mua 2 tặng 1', 'description' => 'Mua hai ly bất kỳ, nhận ngay một ly miễn phí.', 'discount_percent' => 33.33, 'discount_amount' => 35000, 'start_date' => now(), 'end_date' => now()->addDays(10), 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('post')->insert([
            ['user_id' => 1,  'content' => 'Hôm nay ghé Cà Phê Sáng, không gian thật sự rất yên tĩnh và thư giãn!', 'image_url' => 'https://example.com/images/post1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'content' => 'Cafe Phố có góc sống ảo cực chất, rất thích hợp cho những ai thích chụp ảnh!', 'image_url' => 'https://example.com/images/post2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('comment')->insert([
            ['user_id' => 1, 'post_id' => 1, 'content' => 'Quán đẹp quá, chắc chắn sẽ ghé lại!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'post_id' => 2, 'content' => 'Chắc chắn sẽ ghé qua Cafe Phố để check-in!', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('favoriteshop')->insert([
            ['user_id' => 1, 'shop_id' => 1, 'saved_at' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'shop_id' => 2, 'saved_at' => now(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('recentsearch')->insert([
            ['user_id' => 1, 'search_keyword' => 'Cà phê ngon gần đây', 'searched_at' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'search_keyword' => 'Quán cà phê yên tĩnh', 'searched_at' => now(), 'created_at' => now(), 'updated_at' => now()],
        ]);
      
        DB::table('notification')->insert([
            ['user_id' => 1, 'type' => 'order', 'message' => 'Đơn hàng của bạn đã được xác nhận.', 'is_read' => false, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'type' => 'promotion', 'message' => 'Bạn có khuyến mãi mới từ quán yêu thích.', 'is_read' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
