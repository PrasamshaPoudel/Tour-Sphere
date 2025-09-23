<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => '10 Must-Visit Destinations in Nepal for Adventure Seekers',
                'content' => 'Nepal, the land of the Himalayas, offers some of the most breathtaking adventure destinations in the world. From the towering peaks of Everest to the lush jungles of Chitwan, this country has something for every adventure seeker.

The Everest Base Camp trek is a once-in-a-lifetime experience that takes you through some of the most spectacular mountain scenery on Earth. Starting from Lukla, this 12-14 day trek offers incredible views of Mount Everest and other 8,000-meter peaks.

Known as one of the best trekking routes in the world, the Annapurna Circuit offers diverse landscapes, from subtropical forests to high-altitude deserts. The Thorong La Pass at 5,416 meters is a highlight of this incredible journey.

Soar above the beautiful Phewa Lake with the Annapurna range as your backdrop. Pokhara is one of the world\'s best paragliding destinations, offering tandem flights for beginners and thermals for experienced pilots.

Experience the thrill of spotting rhinos, tigers, and elephants in their natural habitat. Chitwan offers jungle safaris, canoe rides, and bird watching opportunities.

Each of these destinations offers a unique adventure experience that will create memories to last a lifetime. Whether you\'re a seasoned adventurer or looking to try something new, Nepal has the perfect adventure waiting for you.',
                'author' => 'Sarah Johnson',
                'image' => 'images/everest.jpg'
            ],
            [
                'title' => 'The Ultimate Guide to Trekking in the Himalayas',
                'content' => 'Trekking in the Himalayas is a dream for many adventurers around the world. With its towering peaks, diverse landscapes, and rich cultural heritage, Nepal offers some of the best trekking experiences on the planet.

Before embarking on your Himalayan adventure, proper preparation is essential. Start training 2-3 months before your trek, focus on cardiovascular exercises and leg strength, and practice hiking with a loaded backpack.

The best time to trek is during spring (March-May) and autumn (September-November) when the weather is clear and stable. These seasons offer excellent visibility of mountain peaks and comfortable temperatures for trekking.

Popular trekking routes include the Everest Base Camp trek (12-14 days), Annapurna Circuit (14-21 days), and Langtang Valley trek (7-10 days). Each offers unique experiences and varying difficulty levels.

Essential gear includes high-quality hiking boots, layered clothing for varying temperatures, a sleeping bag rated for cold weather, trekking poles, and a first aid kit.

Remember to acclimatize properly, stay hydrated, walk at a steady pace, and always respect local cultures and traditions. Trekking in the Himalayas is not just about reaching the destination; it\'s about the journey, the people you meet, and the memories you create.',
                'author' => 'Michael Chen',
                'image' => 'images/trekking.jpg'
            ],
            [
                'title' => 'Discovering Nepal\'s Hidden Cultural Gems',
                'content' => 'While Nepal is famous for its mountains and adventure activities, the country\'s rich cultural heritage often goes unnoticed by many visitors. From ancient temples to traditional villages, Nepal offers a treasure trove of cultural experiences waiting to be discovered.

The Kathmandu Valley is home to seven UNESCO World Heritage Sites, each offering a unique glimpse into Nepal\'s rich history and culture. Pashupatinath Temple, one of the most sacred Hindu temples in the world, is dedicated to Lord Shiva and offers insights into Hindu death rituals.

Boudhanath Stupa, one of the largest Buddhist stupas in the world, is a center of Tibetan Buddhism in Nepal. The peaceful atmosphere and the sight of devotees circumambulating the stupa create a deeply spiritual experience.

Swayambhunath, also known as the Monkey Temple, is perched on a hill overlooking Kathmandu and is famous for its resident monkeys and panoramic city views.

Traditional villages like Bandipur and Tansen offer a perfect blend of natural beauty and cultural heritage. These charming hill stations showcase traditional Newari architecture and warm hospitality.

Nepal\'s calendar is filled with colorful festivals including Dashain, Tihar, Holi, and Buddha Jayanti. These celebrations offer unique cultural experiences and insights into local traditions.

The country is also famous for its traditional arts and crafts, including Thangka painting, intricate wood carvings, and metalwork by the Newar people.',
                'author' => 'Priya Sharma',
                'image' => 'images/culture.jpg'
            ],
            [
                'title' => 'Wildlife Safari in Chitwan: A Complete Guide',
                'content' => 'Chitwan National Park, Nepal\'s first national park, offers one of the best wildlife safari experiences in Asia. Home to the endangered one-horned rhinoceros, Bengal tigers, and over 500 species of birds, this UNESCO World Heritage Site is a paradise for nature lovers.

Established in 1973, Chitwan National Park covers an area of 932 square kilometers in the Terai region of Nepal. The park is home to diverse ecosystems, including grasslands, forests, and wetlands, making it one of the most biodiverse areas in the country.

Wildlife you can spot includes one-horned rhinoceros (most common sighting), Bengal tigers (rare but possible), Asian elephants, sloth bears, leopards, wild boars, various species of deer, and over 500 species of birds.

The best time to visit is from October to March when the weather is cool and dry, offering clear visibility and more active animals. April to June is hot but good for bird watching, while July to September is monsoon season with lush green vegetation.

Safari activities include jeep safaris (most popular), elephant safaris (traditional way), canoe rides (peaceful exploration), and walking safaris (most adventurous). Each offers a unique perspective on the park\'s wildlife and ecosystems.

Accommodation options range from luxury lodges to budget-friendly hotels, all offering easy access to safari activities and park attractions.',
                'author' => 'David Wilson',
                'image' => 'images/chitwan.jpg'
            ],
            [
                'title' => 'Pokhara: The Adventure Capital of Nepal',
                'content' => 'Pokhara, nestled beside the serene Phewa Lake with the majestic Annapurna range as its backdrop, is often called the adventure capital of Nepal. This beautiful city offers a perfect blend of natural beauty, adventure activities, and cultural experiences.

Pokhara\'s unique location makes it a gateway to some of Nepal\'s most popular trekking routes while offering numerous adventure activities within the city itself. The combination of lake, mountains, and pleasant climate creates an ideal setting for adventure seekers.

Adventure activities in Pokhara include paragliding (considered one of the world\'s best destinations), ultralight flights, zip-lining on one of the world\'s longest zip-lines, bungee jumping from a 70-meter high tower, white water rafting on the Seti River, kayaking and canoeing on Phewa Lake, mountain biking through the countryside, and rock climbing in the Sarangkot area.

Popular trekking routes from Pokhara include the Annapurna Base Camp Trek (7-10 days), Poon Hill Trek (3-4 days), and Mardi Himal Trek (5-7 days). Each offers unique experiences and varying difficulty levels.

Cultural attractions include Phewa Lake (the heart of Pokhara), World Peace Pagoda (Buddhist stupa with panoramic views), Bindhyabasini Temple (important Hindu temple), and the International Mountain Museum.

The best time to visit is from October to April during peak season with clear mountain views and pleasant weather, though May to September offers lush green landscapes with fewer tourists.',
                'author' => 'Emma Thompson',
                'image' => 'images/pokhara.jpg'
            ],
            [
                'title' => 'Lumbini: The Birthplace of Buddha and Spiritual Journey',
                'content' => 'Lumbini, the birthplace of Lord Buddha, is one of the most sacred places in the world for Buddhists and a UNESCO World Heritage Site. This peaceful destination offers visitors a unique opportunity to connect with Buddhist spirituality and learn about the life of one of history\'s most influential figures.

Lumbini holds immense historical and spiritual significance as the birthplace of Siddhartha Gautama, who later became known as Buddha. Born in 623 BC, Buddha\'s teachings have influenced millions of people worldwide for over 2,500 years.

The Lumbini Sacred Garden is the heart of the pilgrimage site, containing several important monuments including the Maya Devi Temple (marking the exact spot where Buddha was born), the Ashoka Pillar (erected by Emperor Ashoka in 249 BC), and the Sacred Pond (where Queen Maya Devi bathed before giving birth).

Lumbini is home to numerous monasteries and temples built by different Buddhist countries, each representing their unique architectural styles and traditions. These include the World Peace Pagoda, Royal Thai Monastery, Myanmar Golden Temple, Chinese Monastery, Korean Temple, and German Monastery.

Spiritual experiences include meditation sessions, prayer and chanting with local devotees, peaceful pilgrimage walks around the sacred garden, and attending Buddhist teachings and discussions about philosophy and practices.

The best time to visit is from October to March when the weather is pleasant and clear, offering comfortable conditions for walking and meditation. A visit to Lumbini is more than just a tourist experience; it\'s a spiritual journey that can provide deep insights into Buddhist philosophy and practice.',
                'author' => 'Dr. Rajesh Kumar',
                'image' => 'images/lumbini.jpg'
            ],
            [
                'title' => 'Paragliding in Pokhara: Soar Above the Himalayas',
                'content' => 'Pokhara is renowned as one of the world\'s premier paragliding destinations, offering breathtaking aerial views of the Annapurna range and Phewa Lake. This thrilling adventure activity combines the excitement of flight with stunning natural beauty.

The paragliding experience in Pokhara begins with a short drive to Sarangkot, a hill station located at an altitude of 1,600 meters. From here, you\'ll take off with an experienced pilot and soar through the sky, enjoying panoramic views of the Himalayas, Phewa Lake, and the Pokhara Valley below.

The flight typically lasts 30-45 minutes, depending on weather conditions and thermal activity. During the flight, you\'ll experience the thrill of flying like a bird while taking in some of the most spectacular mountain scenery on Earth.

Safety is paramount in paragliding, and all operators in Pokhara are required to follow strict safety protocols. Your pilot will be fully certified and experienced, and all equipment is regularly inspected and maintained.

The best time for paragliding in Pokhara is from October to April when the weather is clear and stable. Early morning flights offer the best conditions with calm winds and excellent visibility.

Whether you\'re a first-time flyer or an experienced paraglider, Pokhara offers an unforgettable experience that will leave you with memories to last a lifetime.',
                'author' => 'Alex Rodriguez',
                'image' => 'images/paragliding.jpg'
            ],
            [
                'title' => 'White Water Rafting: Conquer Nepal\'s Mighty Rivers',
                'content' => 'Nepal offers some of the world\'s best white water rafting experiences, with rivers ranging from gentle Grade 2 rapids to challenging Grade 5+ rapids. The country\'s diverse geography and abundant water sources create perfect conditions for this thrilling adventure sport.

The Trishuli River is the most popular rafting destination in Nepal, offering a perfect combination of exciting rapids and beautiful scenery. This river is suitable for both beginners and experienced rafters, with rapids ranging from Grade 2 to Grade 3.

For more experienced rafters, the Bhote Koshi River offers challenging Grade 4+ rapids in a spectacular mountain setting. This river is known for its technical rapids and requires previous rafting experience.

The Kali Gandaki River offers a unique rafting experience through the deepest gorge in the world, with the Annapurna and Dhaulagiri mountains towering above you on both sides.

Rafting trips typically include professional guides, safety equipment, and transportation. Most trips last from half a day to several days, with overnight camping options available for longer expeditions.

Safety is always the top priority, and all operators provide comprehensive safety briefings and high-quality equipment. Your guide will be experienced and certified, ensuring a safe and enjoyable experience.

The best time for rafting in Nepal is from October to April when the water levels are ideal and the weather is pleasant. Monsoon season (June to September) brings higher water levels and more challenging conditions.

White water rafting in Nepal is not just about the rapids; it\'s about experiencing the country\'s natural beauty from a unique perspective and creating unforgettable memories with fellow adventurers.',
                'author' => 'Maria Santos',
                'image' => 'images/rafting.jpg'
            ],
            [
                'title' => 'Bungee Jumping: Take the Ultimate Leap of Faith',
                'content' => 'Nepal offers some of the world\'s most spectacular bungee jumping experiences, with locations that combine thrilling adventure with breathtaking natural beauty. The Last Resort, located near the Tibetan border, is home to one of the world\'s highest bungee jumps.

The bungee jump at The Last Resort is 160 meters high, making it one of the tallest in the world. The jump takes place from a suspension bridge over the Bhote Koshi River, with stunning mountain views as your backdrop.

The experience begins with a safety briefing and equipment check, followed by a walk to the jump platform. Once you\'re ready, you\'ll take the leap of faith and free-fall for several seconds before the bungee cord catches you and bounces you back up.

The entire experience is carefully managed by experienced professionals who ensure your safety at every step. All equipment is regularly inspected and maintained to the highest standards.

For those who want to experience the thrill without the full jump, the resort also offers a "swing" option that provides a similar adrenaline rush with a different type of free-fall experience.

The best time for bungee jumping in Nepal is from October to April when the weather is clear and the river conditions are ideal. The experience is available year-round, but weather conditions may affect availability during monsoon season.

Bungee jumping in Nepal is not just about the adrenaline rush; it\'s about conquering your fears, pushing your limits, and experiencing one of the most thrilling adventures available anywhere in the world.',
                'author' => 'James Wilson',
                'image' => 'images/bungee.jpg'
            ],
            [
                'title' => 'Mountain Biking: Explore Nepal on Two Wheels',
                'content' => 'Mountain biking in Nepal offers a unique way to explore the country\'s diverse landscapes, from the bustling streets of Kathmandu to the remote mountain trails of the Himalayas. This adventure activity combines physical challenge with cultural immersion and natural beauty.

The Kathmandu Valley offers numerous mountain biking routes that take you through traditional villages, ancient temples, and beautiful countryside. These routes range from easy rides suitable for beginners to challenging trails for experienced riders.

The Pokhara area is another popular mountain biking destination, with trails that offer stunning views of the Annapurna range and Phewa Lake. The terrain here varies from gentle hills to challenging mountain passes.

For more adventurous riders, the Mustang region offers some of the most challenging and rewarding mountain biking experiences in Nepal. The trails here take you through remote mountain villages and offer spectacular views of the Himalayas.

Mountain biking tours typically include bike rental, safety equipment, and a professional guide. Most tours can be customized to suit your skill level and interests, from half-day rides to multi-day expeditions.

The best time for mountain biking in Nepal is from October to April when the weather is clear and the trails are in good condition. The monsoon season (June to September) can make some trails muddy and challenging.

Safety is always a priority, and all tours include comprehensive safety briefings and high-quality equipment. Your guide will be experienced and knowledgeable about the local terrain and conditions.

Mountain biking in Nepal is not just about the physical challenge; it\'s about experiencing the country\'s natural beauty and cultural heritage in a unique and active way.',
                'author' => 'Lisa Chen',
                'image' => 'images/mountainbiking.jpg'
            ]
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}
