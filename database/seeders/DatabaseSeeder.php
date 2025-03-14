<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Shopimage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed bảng user
        DB::table('users')->insert([
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
                'shop_name' => 'Si:mê coffee',
                'phone' => '0909123456',
                'user_id' => 1,
                'description' => 'Không gian thoải mái, lý tưởng cho làm việc.',
                'address_id' => 1,
                'status' => 'open',
                'opening_time' => '07:00:00',
                'closing_time' => '22:00:00',
                'parking' => 'Có',
                'wifi_password' => 'thecoffee123',
                'hotline' => '19001001',
                'rating' => 4.5,
                'min_price' => 35,
                'max_price' => 65,
                'styles_id' => 1,
                'social_network_id' => 1,
                'cover_image' =>'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/482808478_9248794335189644_2464226863836699996_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=aa7b47&_nc_ohc=Hsm4ox8WwT0Q7kNvgGhrBXF&_nc_oc=AdgtApXGSz0HKnAHJ4L26hWpsYKpyinZDHv8_lSvmX7gvXTBO7xajeSyH9_2iTA6Bxk&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=A2WEEi5ib0DcKdrbSftGGlw&oh=00_AYFU5-FQHWNwjunSRfBnDVNnlTDmNC91dH2aTBPBWQLbGA&oe=67D85545',
                'image_1' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/483483256_9248795461856198_590809737711180629_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=aa7b47&_nc_ohc=0TF90IcMRJEQ7kNvgGz744_&_nc_oc=AdgN85LI4rdg2GypiSfR6FwGHCx-LwmSibrLnmut6AWv-C3NtolprZsXRGLP39_-hzA&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=ASrYW12E0QA8YgR8f2ZwRRQ&oh=00_AYEY6T-rsv6We-2TfZzyxL-2qweAv-MGcgyRS7nZBVV-xQ&oe=67D8290F',
                'image_2' => 'https://scontent.fdad1-4.fna.fbcdn.net/v/t39.30808-6/482317198_9248794958522915_4858635141225945995_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=aa7b47&_nc_ohc=zrk5w48EbkMQ7kNvgHAlw2B&_nc_oc=Adixzzqxkg6sYsV6a08olSplFEIVSocFj0rgbuTm-8kc48t7CDXsUHSHR5WrgovGDJg&_nc_zt=23&_nc_ht=scontent.fdad1-4.fna&_nc_gid=AKPo-j3o7BloRcz-9GR-W0H&oh=00_AYGmlN8nE_T-oRM82keLf3z6DvVLGwbQUxOdqzPFGFzhTQ&oe=67D82776',
                'image_3' => 'https://scontent.fdad1-1.fna.fbcdn.net/v/t39.30808-6/482326258_9248796305189447_7458587394466765472_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=aa7b47&_nc_ohc=VbsZm6NybRcQ7kNvgEiK7-d&_nc_oc=Adg8_KY_oUNJq8iPwc4ZZQbUkibl6PUFIWdm_OhNFKIFDotwD7DyEMCOAUxj3gBNifo&_nc_zt=23&_nc_ht=scontent.fdad1-1.fna&_nc_gid=APPS8lYQlROWjAON_x_Pzdn&oh=00_AYHLTGNP_pjCmkYd85zVSnncOqtqS31aHVQhvkkoUyOAYw&oe=67D829CC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shop_name' => '𝑪𝒉𝒖𝒚𝒆̣̂𝒏 Coffee',
                'phone' => '0909234567',
                'user_id' => 2,
                'description' => '𝑪𝒉𝒖𝒚𝒆̣̂𝒏 nép mình ở một góc phố bình lặng, dưới hàng cây cao lớn, mang nét Việt giản đơn và ấm áp. Gian nhà mái ngói của 𝑪𝒉𝒖𝒚𝒆̣̂𝒏 đã ngập tràn không khí Xuân,
                 trang trí đơn giản mà hợp vibes, với đầy sắc đỏ may mắn',
                'address_id' => 2,
                'status' => 'open',
                'opening_time' => '08:00:00',
                'closing_time' => '23:00:00',
                'parking' => 'Có',
                'wifi_password' => 'chuyen456',
                'hotline' => '19001002',
                'rating' => 4.2,
                'min_price' => 35,
                'max_price' => 65,
                'styles_id' => 2,
                'social_network_id' => 2,
                'cover_image' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472786241_568556892665719_6248913709442310172_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_ohc=QjRFT4GCztsQ7kNvgEEvL_y&_nc_oc=Adhi5KYaxQxpK_4Jfa9bNaLqAflK8mehZXz4NpdO_cmAFhELiH4_0ubNGz5GdSe3L_Q&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYG5R4gzoG_fa1ZQ1zO6W5ajxLYnfH2eVaBJPGqQXOkVxA&oe=67D856CC',
                'image_1' => 'https://scontent.fdad1-1.fna.fbcdn.net/v/t39.30808-6/472737940_568556779332397_3180797335415842074_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=nmo7Zd324l0Q7kNvgEe-P47&_nc_oc=AdhEmwbVweG6VO_JXcFXTXZng-K5P_sydR114brXn9Wp60K677MsNzsaXR3qGvhIOfQ&_nc_zt=23&_nc_ht=scontent.fdad1-1.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYFtib9XqOPlxuH7oSKl4xdh8iJZpfCEBhRNxaKst0ohWA&oe=67D84FC6',
                'image_2' => 'https://scontent.fdad1-2.fna.fbcdn.net/v/t39.30808-6/473275030_568556975999044_2285307854567972612_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_ohc=xFEXSNmXwmQQ7kNvgGAVF9-&_nc_oc=AdgUYD-8165l7PcmjeDx10lJw7keNV6GZk6GJUYlTcoSM7gxbTDf9HkM9bDI2TeG5mo&_nc_zt=23&_nc_ht=scontent.fdad1-2.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYFoPuVoEJx0qxVx9MKG-lW1ZJarh3WOGdE9UKxiHbID-g&oe=67D84058',
                'image_3' => 'https://scontent.fdad1-3.fna.fbcdn.net/v/t39.30808-6/472741224_568556935999048_872064215812634735_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_ohc=k1qpHFkDST0Q7kNvgHtlUAC&_nc_oc=AdhzcIJVB3xHXoIkypF7EWCHw2CamSSAENM-IxRrDMZyNl6AbS1oYGQvF9C4CDqQIAw&_nc_zt=23&_nc_ht=scontent.fdad1-3.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYHEXnFxT_PBhbh0q-VSgIJ5Sf-zPuoWosn8UNTpn8vgtw&oe=67D82553',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shop_name' => 'About US',
                'phone' => '0909345678',
                'user_id' => 1,
                'description' => ' mang hơi thở industrial đầy cá tính, kết cấu không gian đơn giản từ ngôi nhà cũ được cải tạo, thông phá; nội thất tối giản, gam màu - vật liệu mạnh mẽ. Tuy nhiên tổng thể phong cách có phần quen thuộc, 
                chưa đẫm nét sáng tạo, điểm nổi bật riêng',
                'address_id' => 2,
                'status' => 'open',
                'opening_time' => '06:30:00',
                'closing_time' => '21:30:00',
                'parking' => 'Không',
                'wifi_password' => 'phuclong789',
                'hotline' => '19001003',
                'rating' => 4.0,
                'min_price' => 35,
                'max_price' => 65,
                'styles_id' => 2,
                'social_network_id' => 2,
                'cover_image' => 'https://scontent.fdad1-2.fna.fbcdn.net/v/t39.30808-6/472358354_566630119525063_4283961449251404054_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_ohc=Kcr0OrdHPRcQ7kNvgF_BoBn&_nc_oc=AdiSjUN-0DZ-8RZyxV4C74n2ICN-ZyxobniUyZkfdHsFUmTwewc9e4YZxVRtmAYHekc&_nc_zt=23&_nc_ht=scontent.fdad1-2.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYH-DqM8ZbAGXaljemNUJqO-OnRZqN6Z42LULxYKCDMCEA&oe=67D826FF',
                'image_1' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472346464_566630146191727_2046451349426910080_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_ohc=6gHkC2AXLfQQ7kNvgGjkDIV&_nc_oc=AdhJcscqe6dsi0slW34yIlxAPtNYzZNfCg4Grigk1ui8-B53kJmMxDUTC9U7c46FQ4Q&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYG5F5m__03qLlNk29uFH8QejL2ohQPrUWakIDbJzWZahg&oe=67D82DE5',
                'image_2' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472336454_566630392858369_2484225781228462609_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=107&ccb=1-7&_nc_sid=833d8c&_nc_ohc=IS9_vZR88D8Q7kNvgFVQTrx&_nc_oc=Adjp71r46M5LT6YQ4_7VPvNgAY5ZyHZA1TvdjEkjJyl35S0Z88UmpB6gkzobk1Ve5U8&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYEVolL_D9QOIF6reS8JyKqWko68oKJOfKYUrckaWzvqcA&oe=67D83253',
                'image_3' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472223852_566630346191707_4971242449072189609_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_ohc=jiiAsRiYPs4Q7kNvgFB1MPq&_nc_oc=Adhiq8rwjQMIDWuXZyJxBueeyeuW2383EMZhl091CsaRWGCGyZTQKXVVE3fDZsdEYoU&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=An0N6LHJT85JXfihApYBVh0&oh=00_AYGR-3qKUw7kTYIRNGcfzlmS-qcOqZTNPaLtU4r2nzCAYw&oe=67D82DF2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shop_name' => 'Thì Là ',
                'phone' => '0909456789',
                'user_id' => 1,
                'description' => 'Tọa độ mới đầy nổi bật trên con đường dọc bờ sông Hàn - ThìLà mang một nét riêng độc đáo, sáng tạo, chứa đựng hồn Việt nhẹ nhàng. Không gian quán vừa phải, mặt tiền trải dài cùng đường nét kiến trúc tạo cảm giác to lớn. Trải nghiệm ThìLà ta cảm nhận được sự đầy tư chỉn chu từ câu chuyện đến vật liệu, nội thất, 
                ánh sáng,...; sự hài hòa giữa cũ và mới đem lại sự thư thái, dễ chịu',
                'address_id' => 2,
                'status' => 'closed',
                'opening_time' => '09:00:00',
                'closing_time' => '21:00:00',
                'parking' => 'Có',
                'wifi_password' => 'urban456',
                'hotline' => '19001004',
                'rating' => 3.8,
                'min_price' => 35,
                'max_price' => 65,
                'styles_id' => 1,
                'social_network_id' => 1,
                'cover_image' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472266337_564477443073664_5703315669325658867_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_ohc=z7fcG423yOUQ7kNvgHp1a_N&_nc_oc=AdgphcPmJhferHDUV0yZjDyMYg7bYQr0Vr_zrVa82T2Fd20q9Pww0Pfm5RGiUQGkLdU&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=AMYollvzDScOGajTgInjLbV&oh=00_AYEiRniiwp2LiYPjo4cP4jTJCrqDPizyV0Q_j4G_ke6kvw&oe=67D85759',
                'image_1' => 'https://scontent.fdad1-4.fna.fbcdn.net/v/t39.30808-6/472223548_564477706406971_6874300077988024761_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_ohc=nL2uAcrlBrMQ7kNvgEpcfMg&_nc_oc=AdhJ3M0cup4OmGbe16DmjoiKZVHSQVXwYYWY_9GT2x3uhsedBCpGRgdHryFfQe4aLco&_nc_zt=23&_nc_ht=scontent.fdad1-4.fna&_nc_gid=AMYollvzDScOGajTgInjLbV&oh=00_AYFZ9IYumCtRC1ZwkFxNnDCod17I_GIhEFmOOvy4wQ1AFg&oe=67D82772',
                'image_2' => 'https://scontent.fdad1-2.fna.fbcdn.net/v/t39.30808-6/472280456_564477979740277_2537331362589939898_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=106&ccb=1-7&_nc_sid=833d8c&_nc_ohc=LjH96wjVZasQ7kNvgGa39VP&_nc_oc=AdjKfZE_c2JRQ1CliYuRCKBhHI090TrY2NTt-Xqe8QTGttP3_qcObvJ0KXOoXDpzphc&_nc_zt=23&_nc_ht=scontent.fdad1-2.fna&_nc_gid=AMYollvzDScOGajTgInjLbV&oh=00_AYGGT38xziVNsGUz8Y-4KjRJOvx6IMKeZPUmv8SxJiNKeg&oe=67D84A1A',
                'image_3' => 'https://scontent.fdad2-1.fna.fbcdn.net/v/t39.30808-6/472388491_564478009740274_2160099933372943582_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=107&ccb=1-7&_nc_sid=833d8c&_nc_ohc=9mfs_z-F4j8Q7kNvgEInQR0&_nc_oc=AdgE2ZAeb81bbJSmOecIFCWKwelE0xFfOqfz9qui64luPj8bFgH8F7NeX6dHcSxYJvg&_nc_zt=23&_nc_ht=scontent.fdad2-1.fna&_nc_gid=AMYollvzDScOGajTgInjLbV&oh=00_AYFCtGw2ZEj1d6DAGaU_5Tau4ISV2mSdcuqBnwFCg-dTWw&oe=67D84A56',
                'created_at' => now(),
                'updated_at' => now(),
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

        DB::table('promotion')->insert([
            ['shop_id' => 1, 'title' => 'Giảm 20% cho sinh viên', 'description' => 'Ưu đãi đặc biệt cho sinh viên khi mang theo thẻ.', 'discount_percent' => 20.00, 'discount_amount' => 10000, 'start_date' => now(), 'end_date' => now()->addDays(7), 'created_at' => now(), 'updated_at' => now()],
            ['shop_id' => 2, 'title' => 'Mua 2 tặng 1', 'description' => 'Mua hai ly bất kỳ, nhận ngay một ly miễn phí.', 'discount_percent' => 33.33, 'discount_amount' => 35000, 'start_date' => now(), 'end_date' => now()->addDays(10), 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('post')->insert([
            [
                'user_id' => 1,
                'title' => '31 quán cà phê đẹp ở Sài Gòn “đi một lần post ảnh một tuần”',
                'content' => '31 quán cà phê đẹp ở Sài Gòn có đủ mọi phong cách từ hiện đại, phóng khoáng cho đến vintage,
                 để bạn lựa chọn cho một buổi chiều không biết “đi đâu về đâu”.',
                'image_url' => 'https://cdn3.ivivu.com/2019/06/quan-cafe-sai-gon-ivivu-12.jpg',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'title' => 'Bật mí top 17 quán cafe ĐẸP ở Sài Gòn nên ghé ít nhất một lần',
                'content' => 'CQuán cafe đẹp ở Sài Gòn là từ khóa được nhiều du khách tìm kiếm nhất mỗi khi ghé thăm Sài thành. Bên cạnh cảnh đẹp và nền ẩm thực phong phú, 
                có lẽ những quán cafe “chất” đã trở thành một phần không thể thiếu của nơi đây.',
                'image_url' => 'https://statics.vinwonders.com/quan-cafe-dep-o-sai-gon-anh-11_1633055492.jpg',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'title' => 'Top 20 quán cafe đẹp ở Sài Gòn đẹp say đắm lòng người',
                'content' => 'Sài Gòn thành phố nhộn nhịp tấp nập có nhiều địa điểm vui chơi, giải trí, thư giãn. Nơi đây nổi tiếng với nhiều quán cà phê nổi tiếng ngon, view sống ảo cực đỉnh, sau đây hãy cùng Reviewvilla.vn tìm hiểu các quán cafe đẹp ở Sài Gòn nhé!',
                'image_url' => 'https://reviewvilla.vn/wp-content/uploads/2022/07/quan-cafe-dep-o-sai-gon-6.jpg',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'title' => 'Ghé 9 quán cà phê vintage ở Sài Gòn',
                'content' => 'Những quán cà phê vintage luôn có sức hút riêng không thể cưỡng lại. Đó là sự pha trộn giữa cổ điển và phong cách đương đại, tạo nên một không gian tràn đầy cảm xúc cho những coffee-holic Sài Thành.
                 Hãy theo chân Traveloka tìm đến 9 quán cà phê vintage Sài Gòn đẹp và cực đậm chất retro nhé!',
                'image_url' => 'https://ik.imagekit.io/tvlk/blog/2022/08/ca-phe-vintage-sai-gon-53.jpeg?tr=q-70,c-at_max,w-500,h-250,dpr-2',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now()
            ],
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
        DB::table('likes')->upsert([
            ['user_id' => 1, 'coffeeshop_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'coffeeshop_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'coffeeshop_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ], ['user_id', 'coffeeshop_id']);
        

    }
}
