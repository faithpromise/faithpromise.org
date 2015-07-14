<?php

use App\Staff;
use App\Campus;
use Carbon\Carbon;
use Flynsarmy\CsvSeeder\CsvSeeder;

class StaffSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'staff';
        $this->filename = base_path() . '/database/seeds/csv/' . $this->table . '.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('staff')->truncate();
        DB::table('staff_team')->truncate();
        DB::table('staff_ministry')->truncate();

        $staff_member = new Staff([
            'ident' => 'chris-stephens',
            'first_name' => 'Chris',
            'last_name' => 'Stephens',
            'display_name' => 'Dr. Chris Stephens',
            'title' => "Senior Pastor",
            'email' => 'Pastor@faithpromise.org',
            'phone_ext' => '2000',
            'bio' => "<p>Pastor Chris was born in Chattanooga, Tennessee to teen parents who split up when he was only three.<\/p><p>By the age of 22 he was a heavy drug user and dealer. Later that year, Chris woke up in a hospital room after a drug overdose and made a decision to connect with God. This decision was especially amazing since neither Chris nor his family had ever attended church.<\/p><p>Over the next 26 years Chris has been serving God as a speaker and a pastor. He has had the opportunity to speak all over the world and has impacted tens of thousands of lives.<\/p><p>Pastor Chris has written a biographical look at his life and the transformation that took place. The book is called The Climb of Your Life. Chris said if his life could transition from the project to the pulpit; from a life of devastation to an amazing destiny, then so can any life.<\/p><p>As the Senior Pastor of Faith Promise Church, he has seen thousands find hope and fulfillment in their destiny. Chris says his purpose is to help people recognize and achieve their full potential. He came so close to death and missing all God had for him he now wants to help others find the same purpose in their lives that he has found.<\/p><p>Pastor's blog and information about his book can be found at <a href=\"http:\/\/drchrisstephens.com\">DrChrisStephens.com<\/a>.<\/p><p>You can also connect with Pastor Chris via <a href=\"http:\/\/facebook.com\/pastorchris\">Facebook<\/a> and <a href=\"http:\/\/twitter.com\/drchrisstephens\">Twitter<\/a>.<\/p>",
            'sort' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'executive')->first()->id);


        $staff_member = new Staff([
            'ident' => 'josh-whitehead',
            'first_name' => 'Josh',
            'last_name' => 'Whitehead',
            'display_name' => 'Dr. Josh Whitehead',
            'title' => "Executive Pastor",
            'email' => 'JoshW@faithpromise.org',
            'phone_ext' => '1701',
            'bio' => "<p>Josh became Executive Pastor in 2005, during a time when the church had plateaued in attendance. Since that time, Faith Promise has almost doubled in weekly attendance.<\/p><p>Josh's goal is to lead by implementing the vision and values of the church through the staff and ministries. He doubled the staff in 3 years and developed comprehensive hiring, coaching, development, and evaluation plans.<\/p><p>Josh has been married to Kim for ten years and they have 2 children - Hayden Thomas (7) and Madison Kaye (5).<\/p><p>You can keep up with Josh on his blog at <a href=\"http:\/\/joshuawhitehead.net\">JoshuaWhitehead.net<\/a>.<\/p>",
            'sort' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'executive')->first()->id);
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'michele-stephens',
            'first_name' => 'Michele',
            'last_name' => 'Stephens',
            'display_name' => 'Michele Stephens',
            'title' => "Worship and Creative Arts Leader",
            'email' => 'MicheleS@faithpromise.org',
            'phone_ext' => '1501',
            'bio' => "<p>My name is Michele but I often answer to \"Shay\", \"Coach\", \"Mich\" and \"Mom\". These names come from relationships with my husband, co-workers, team members and my children.<\/p><p>I have been married to my best friend, Chris (who happens to be the Sr. Pastor), for 25 years, and we have 3 awesome children Faith, Micah, and Zac as well as a brand new son-in-law, Frankie.<\/p><p><strong>When I Met Jesus:<\/strong> I grew up in a godly home where my parents taught me how to study and memorize God?s word, share my faith, and most of all, worship. I began my relationship with Jesus at the age of 8 years old, and what a ride it has been!<\/p><p><strong>My Calling:<\/strong> As far as a calling to be a worship leader ? that one kind of snuck up on me. I had grown up in a musical home where both of my parents lead in worship through singing and playing the guitar. My dad would make me play the piano and sing (at the time I hated it ? I was scared to death!) in church, during mission trips, or anywhere else he could find. After all those experiences, I guess I should have seen what was coming down the pike.<\/p><p>I met my sweetheart at what was then called the BSU at UT-Chattanooga. He was going to be a preacher ? me a preacher?s wife?! But now I know that God had prepared me my whole life to be Chris? helpmate and ministry partner. I loved working in different areas as we began our ministry, but it seemed no matter what ministry it was, worship was at the heart.<\/p><p>As the ministry assistant to the Worship Pastor at Faith Promise Church, they asked me to fill in when he left until they could find someone. Well, that was almost 9 years ago. God has confirmed to me over and over that He called me and put me where I am today ? I would have never believed it, and there is no way I could do what I do without the anointing and favor of the Lord.<\/p><p><strong>Favorite Music:<\/strong> Anything Hillsong, anything Chris Tomlin, and ?clean? classic rock. (I am an ?80s girl.)<\/p><p><strong>Hobbies:<\/strong> Anything with my family, scrapbooking, and photography.<\/p>",
            'sort' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'executive')->first()->id);
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'gloria-petrowski',
            'first_name' => 'Gloria',
            'last_name' => 'Petrowski',
            'display_name' => 'Gloria Petrowski',
            'title' => "Assistant to the Senior Pastor",
            'email' => 'GloriaP@faithpromise.org',
            'phone_ext' => '2000',
            'bio' => "<p>I was born in Oak Ridge and have never lived anywhere else. I was raised in a loving Christian home and was saved and baptized at the age of nine. I have one younger sister, Lisa, who lives in Snellville, GA. My parents are both deceased.<\/p><p>I have been married to my awesome husband, Larry, for 36 years. God blessed us with two wonderful children - Justin, 27 and Jenna, 24 - and their equally wonderful spouses - Kara, 26 and Ben, 25. We all serve the Lord here together in various ways in the Worship Ministry of Faith Promise. I began singing in the Cherub Choir at the age of three and have been singing since that time!<\/p><p>I was the first employee hired here when Faith Promise began in 1995. I worked first in finance and membership and then became Pastor Chris' personal assistant when he joined us in 1996. What a joy it is to serve alongside him and to see all the many miracles God continues to perform here!<\/p><p>I enjoy walking, boating, reading, and especially traveling. If someone says \"go\", I am always ready! I love hot chocolate-chip cookies and don't like greens! I don't like heights, but through the years I have learned to conquer that fear somewhat. My nickname growing up was Glory or Gloworm and I can speak pig-Latin really fast!<\/p>",
            'sort' => 700,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'marti-willen',
            'first_name' => 'Marti',
            'last_name' => 'Willen',
            'display_name' => 'Marti Willen',
            'title' => "Assistant to the Executive Pastor & First Impressions Director",
            'email' => 'MartiW@faithpromise.org',
            'phone_ext' => '1700',
            'bio' => "<p>I came on staff in 2007, and I absolutely love working at FPC! I have a fantastic life, thanks to my awesome husband, Tim, and our boys, Jacob and Caleb. I love hanging out with my family, reading, singing, and most of all, I love laughing.<\/p><p>Some random facts about me are that I moved 15 times as a kid, feet gross me out, and I got to hold the Olympic Torch while in China! Both of my boys weighed 10 pounds at birth, and they were both 22 ¾ inches long! I'm a perfectionist by nature, but by His Spirit I am learning that continuously perfecting my relationship with God is the most important thing I could ever do. FPC has given more opportunities than I could have ever dreamed of, and I am so grateful that God led me to a place where He is constantly moving.<\/p><p>Follow me on <a href=\"http:\/\/twitter.com\/mwillen\" target=\"_blank\">Twitter<\/a>, or friend me on <a href=\"http:\/\/www.facebook.com\/profile.php?id=1628694786&ref=ts\" target=\"_blank\">Facebook<\/a>.<\/p>",
            'sort' => 710,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'aaron-goin',
            'first_name' => 'Aaron',
            'last_name' => 'Goin',
            'display_name' => 'Aaron Goin',
            'title' => "Chief Financial Officer",
            'email' => 'AaronG@faithpromise.org',
            'phone_ext' => '1602',
            'bio' => "<p>Aaron Goin joined the staff of Faith Promise as Finance Director in August 2007, and in January 2011, Aaron took on the role of Chief Financial Officer. In this role he gets to work alongside great teams in Finance, Human Resources, Information Technology, and Facilities.<\/p><p>Aaron and his wife Kerri were married in 2000. Their daughter Grace was born in April 2006 and their son Mason was born in August of 2009. They love all things Disney, Dollywood, the beach, and any other kind of family adventure.<\/p><p>In 2002, Aaron graduated from the University of Tennessee with a bachelor's degree in Finance. He received his Master of Business Administration degree in December 2010. Before joining the staff of Faith Promise, he worked for five years at Oak Ridge National Laboratory as a Subcontract Administrator.<\/p><p>\"It has been an amazing journey to watch Faith Promise grow and to play a small part in that growth. Can't wait to see what God does as we continue to reach the world for Him.\"<\/p>",
            'sort' => 720,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'anderson')->first()->id,
            'ident' => 'kandice-baker',
            'first_name' => 'Kandice',
            'last_name' => 'Baker',
            'display_name' => 'Kandice Baker',
            'title' => "North Knoxville Campus fpKids Director",
            'email' => 'KandiceB@faithpromise.org',
            'phone_ext' => '1103',
            'bio' => "<p>Kandice grew up in Johnson City, Tennessee, and graduated at the University of Tennessee. While in college, she met and married the love of her life, Mike, who led her to the Lord.<\/p><p>They were soon after blessed with a baby girl, and their family grew to five kids. Kandice was a stay-at-home mom for many years.<\/p><p>Her experience as a mother of five children allows her to connect with families on a personal level as she relates to everyday life and the challenges of raising kids. Her passion is to connect people to God, to each other, and to service. She especially loves hearing the stories of young people accepting Jesus.<\/p><p>Kandice joined the fpKids staff in 2003 and became the North Knoxville Children's Ministry Director in January 2012. Her husband, Mike, serves as the North Knoxville Campus Pastor of Faith Promise.<\/p>",
            'sort' => 410,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'matt-grimes',
            'first_name' => 'Matt',
            'last_name' => 'Grimes',
            'display_name' => 'Matt Grimes',
            'title' => "Blount Campus Pastor",
            'email' => 'MattG@faithpromise.org',
            'phone_ext' => '1706',
            'bio' => "<p>Matt grew up in Alabama and went to college at Samford University in Birmingham, where he graduated with a degree in religious studies. He also holds a Master's degree in Christian Education from New Orleans Seminary. Matt has served in student ministry at Faith Promise Church since 2005 where he established and built the middle school ministry before taking over all students in 2013. <\/p><p>In addition to his work at Faith Promise and his time traveling and speaking at conferences and events, Matt also serves on staff with Ken Davis and Michael Hyatt as a Communication Coach for Dynamic Communicators International.<\/p><p>Matt is married to Carmen, and they have a beautiful daughter, Elin who was born in 2011.<\/p>",
            'sort' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'pastors')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jaclyn-holloway',
            'first_name' => 'Jaclyn',
            'last_name' => 'Holloway',
            'display_name' => 'Jaclyn Holloway',
            'title' => "Assistant to the Worship and Creative Arts Leader",
            'email' => 'JaclynH@faithpromise.org',
            'phone_ext' => '1503',
            'bio' => "<p>A beach girl at heart that fell in love with the mountains, Jaclyn moved to Knoxville from Virginia Beach in 2005. Jaclyn has a B.S. in Communications from the University of Tennessee with a focus on video production. She has been a part of the worship ministry staff since 2011 and feels extremely blessed to be part of such a talented and creative team. She enjoys scriptwriting and acting as part of her ministry, especially when humor is involved.<\/p><p>When she goes home, she gets to play her favorite role: a wife and mother. Her husband, Phil Holloway is also involved in the worship ministry as the Anderson Campus Worship Pastor. They are blessed with two boys, Jameson and Jude. Favorite family hobbies are having dance parties with Yo Gabba Gabba, drag racing hot wheels, and synchronized swimming in the kiddie pool. Follow their adventures on twitter with @HollowayJaclyn.<\/p>",
            'sort' => 210,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'brad-ervin',
            'first_name' => 'Brad',
            'last_name' => 'Ervin',
            'display_name' => 'Brad Ervin',
            'title' => "Pastor of Outreach and Missions",
            'email' => 'BradE@faithpromise.org',
            'phone_ext' => '1405',
            'bio' => "<p>Brad Ervin is the Pastor of Outreach and Missions at Faith Promise. He joined the staff in Nov 2007, and he and his wife Caroline have been attending faith promise since February of 2006. Brad is a huge Vol fan and loves sports in general. He graduated with a BS in Business Marketing from Samford University in 2001.<\/p><p>Hobbies include: reading (Tolkien\/Ayn Rand\/Robert Jordan some favs), travel, music (especially British Rock), movies, broadway and west end musicals, and sucking the marrow out of life. He is also an accomplished break dancer and pole vaulter.<\/p><p>Facebook him Brad Ervin, twitter: BradErvin and myspace: Volcrazy.<\/p>",
            'sort' => 530,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'missions')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'emily-carringer',
            'first_name' => 'Emily',
            'last_name' => 'Carringer',
            'display_name' => 'Emily Carringer',
            'title' => "Worship Programming Director",
            'email' => 'EmilyC@faithpromise.org',
            'phone_ext' => '1500',
            'bio' => "<p>My husband, Chuck, and I have been at Faith Promise Church since the very first service at the Garden Plaza Hotel in Oak Ridge. However, I didn't join the FPC staff until 2003.<\/p><p>It has been an adventure ever since. You really never know what each day will hold. We have two great kids that have grown up at FPC. Zach is 14 and Maggie is 11. When we're not at church, we love eating out and hanging out together as a family.<\/p><p>I love to read, have fun, and laugh a lot, usually at myself. One of the coolest parts about what I get to do is to help others be a part of the Worship Ministry and serve where they are passionate.<\/p>",
            'sort' => 250,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'justin-petrowski',
            'first_name' => 'Justin',
            'last_name' => 'Petrowski',
            'display_name' => 'Justin Petrowski',
            'title' => "Worship Ministry Associate",
            'email' => 'JustinP@faithpromise.org',
            'phone_ext' => '1502',
            'bio' => "<p><strong>ABOUT ME:<\/strong><br>I've been a follower of Christ since 1987 and can say with confidence that it's the best decision I've ever made. I have been a member of Faith Promise Church since its inception in 1995. I have always enjoyed serving here - so when the opportunity arose to serve here full-time I took it! I have been on staff at Faith Promise since 2001 as an intern in the Worship Ministry and have served on full-time staff since 2003. Since then I've had the unique privilege of ministering to thousands of my brothers and sisters each week through my gift of music. I attended Oak Ridge High School in Oak Ridge, TN and graduated there in 1999. I attended the University of Tennessee after that and graduated in 2003 with an honors degree in mathematics. I have been married to my beautiful wife Kara since October 2006.<\/p><p><strong>FAVES:<\/strong><br>I love to read, watch and play sports, and make music. I enjoy spending time with my wife and with friends. As far as music goes, I love it all...you'll find me listening to anything from Coltrane to Coldplay, Sigur Ros to Sergei Rachmaninoff, U2 to the David Crowder Band and Hillsong. I'm always into something different. I love to read as well and I love exploring the Bible through fresh sets of eyes. Some of my favorite books include Velvet Elvis by Rob Bell, Blue Like Jazz by Donald Miller, and A Generous Orthodoxy by Brian McLaren. Check them out! I'm also a HUGE fan of the Green Bay Packers, the Boston Red Sox, NASCAR, and University of Tennessee athletics. Go VOLS!<\/p><p>God bless you!<br>Hebrews 12:1-3<\/p>",
            'sort' => 260,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'heather-burson',
            'first_name' => 'Heather',
            'last_name' => 'Burson',
            'display_name' => 'Heather Burson',
            'title' => "Graphic Designer",
            'email' => 'HeatherB@faithpromise.org',
            'phone_ext' => '1014',
            'bio' => "<p>Hi, I'm Heather. I'm a native East Tennessean, graduate of the University of Tennessee, and a die-hard Vols fan. My husband, Mike, and I enjoy travel, college football, and a little friendly competition now and again.<\/p><p>On staff since 2007, I love being a member of the Communications Team (part of the Admin staff) and a keeper of the Faith Promise brand. One of my favorite things about designing at Faith Promise is the variety of projects that come my way, but by far the best thing is that is I get to be part of an awesome team that is impacting the world for Christ.<\/p>",
            'sort' => 760,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'online')->first()->id,
            'ident' => 'kyle-gilbert',
            'first_name' => 'Kyle',
            'last_name' => 'Gilbert',
            'display_name' => 'Kyle Gilbert',
            'title' => "Pastor of Communications & Internet Campus Pastor",
            'email' => 'KyleG@faithpromise.org',
            'phone_ext' => '1704',
            'bio' => "<p>Kyle came on staff at Faith Promise Church in October 2008 as the Pastor of Communications. He oversees web technology, graphic design, the Internet Campus, and helping get the word out about our church.<\/p><p>He and his wife, Keri, were married in 1999 and haven't owned a TV since then. They have four crazy-awesome kids, including a set of twins.<\/p><p>Kyle has gone skydiving, and he once went scuba diving in the Black Sea after five minutes of instruction (in Russian).<\/p><p>For fun, Kyle loves to play disc golf and racquetball, and he plays both poorly but with enthusiasm.<\/p><p>You can keep up with Kyle on his blog at <a href=\"http:\/\/kylesrandom.com\">KylesRandom.com<\/a> or <a href=\"http:\/\/twitter.com\/kylegilbert\">follow him on Twitter<\/a>.<\/p>",
            'sort' => 750,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'pastors')->first()->id);
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jody-kenyon',
            'first_name' => 'Jody',
            'last_name' => 'Kenyon',
            'display_name' => 'Jody Kenyon',
            'title' => "Group Ministries",
            'email' => 'JodyK@faithpromise.org',
            'phone_ext' => '1400',
            'bio' => "<p>Jody and her family have been at Faith Promise since the beginning of the church, and she came on staff in February 2001.<\/p><p>Her favorite food is seafood, least favorite food is peas, and greatest fear is snakes.<\/p><p>She has two children, Brandon and Brianna and two beautiful grandchildren, Greyson and Saylor.<\/p><p>Favorite hobbies:<br>Spending time with her family and traveling anywhere warm and coastal!<\/p>",
            'sort' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jennifer-patrick',
            'first_name' => 'Jennifer',
            'last_name' => 'Patrick',
            'display_name' => 'Jennifer Patrick',
            'title' => "Group Assimilation Coordinator",
            'email' => 'JenniferP@faithpromise.org',
            'phone_ext' => '1403',
            'bio' => "<p>Jennifer has been attending Faith Promise Church since January 2002. Soon afterwards, she and her family attended a small group, and that began her love for small group ministry. She started out as a volunteer in small group ministry, and she's been on staff since 2005.<\/p><p>In her free time, she and her husband, Rob love to spend time at the lake with friends and family and make frequent visits to the Smoky mountains.<\/p>",
            'sort' => 510,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'ident' => 'zac-stephens',
            'first_name' => 'Zac',
            'last_name' => 'Stephens',
            'display_name' => 'Zac Stephens',
            'title' => "Pastor of Student Ministries\/Pellissippi Campus St",
            'email' => 'ZacS@faithpromise.org',
            'phone_ext' => '1304',
            'bio' => "",
            'sort' => 300,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'chuck-carringer',
            'first_name' => 'Chuck',
            'last_name' => 'Carringer',
            'display_name' => 'Dr. Chuck Carringer',
            'title' => "Pastor of Leadership Development & Stewardship",
            'email' => 'ChuckC@faithpromise.org',
            'phone_ext' => '1101',
            'bio' => "<p>In my role as Pastor of Leadership Development and Stewardship I partner with staff and volunteers to increase leadership capacity and stewardship across Faith Promise. From 2009-2014 I served as Pastor of Family Ministry. Prior to joining the staff I served for 24 years in public schools. From 1990-2009 I was part of the faculty at Oak Ridge High School serving in a variety of roles including: teacher, coach, vice principal, athletic director, and principal.<\/p><p>My wife Emily, of 25 years, and I have been members of Faith Promise since the church began. I volunteered in a number of ministry areas including serving as an elder, student ministry, school of leaders, and membership classes.<\/p><p>In addition to my role at Faith Promise I provide executive coaching to business leaders. I have a doctorate in executive leadership as well as being a John Maxwell Team Certified Coach, Speaker and Trainer. In addition to executive coaching, I speak frequently to business teams and organizations.<\/p><p>I enjoy family time, and Em, Zach (20 years old), and Maggie (17 years old). We love traveling, especially to the beach! In addition to family fun I enjoy sports, reading, exercising, and time with friends.<\/p><p>Follow Chuck on <a href=\"http:\/\/twitter.com\/chuckcarringer\" target=\"blank\">Twitter<\/a>, <a href=\"http:\/\/www.facebook.com\/chuckcarringer\" target=\"_blank\">Facebook<\/a>, or <a href=\"http:\/\/www.chuckcarringer.com\" target=\"_blank\">his blog<\/a>.<\/p>",
            'sort' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'executive')->first()->id);
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'leadership')->first()->id);


        $staff_member = new Staff([
            'ident' => 'deneen-lambert',
            'first_name' => 'Deneen',
            'last_name' => 'Lambert',
            'display_name' => 'Deneen Lambert',
            'title' => "Assistant to the Chief Financial Officer",
            'email' => 'DeneenL@faithpromise.org',
            'phone_ext' => '1600',
            'bio' => "",
            'sort' => 730,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'joe-filipowicz',
            'first_name' => 'Joe',
            'last_name' => 'Filipowicz',
            'display_name' => 'Joe Filipowicz',
            'title' => "IT Director",
            'email' => 'JoeF@faithpromise.org',
            'phone_ext' => '1605',
            'bio' => "",
            'sort' => 790,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'gina-mcclain',
            'first_name' => 'Gina',
            'last_name' => 'McClain',
            'display_name' => 'Gina McClain',
            'title' => "Pastor of Children's Ministries",
            'email' => 'GinaM@faithpromise.org',
            'phone_ext' => '1204',
            'bio' => "<p>Gina is originally from Broken Arrow, Oklahoma. A graduate of the University of Central Oklahoma, she worked in International Banking before God interrupted her career goals. Gina began working for LifeChurch.tv in 1999. Compelled to work with kids and families, Gina found her rhythm in leveraging what happens at church to impact what happens at home.<\/p><p>Gina is driven by the idea of equipping parents for the journey of teaching their kids how to follow Christ. Based upon her experience as a mom, she identifies with the everyday challenges parents wade through. Most of which seem more messy than spiritual. And yet, in the midst of the mess we have the opportunity to demonstrate Jesus to our kids. It's the most difficult, challenging & rewarding thing we will ever do.<\/p><p>Gina and Kyle were married in 1994 and have three kids, Keegan Josie & Connor. Following the call to join the Faith Promise family, Kyle and Gina packed up their family in February 2010 and moved to Knoxville.<\/p><p>Gina is a writer, a speaker, a mentor and a coffee snob. If you're looking to grease her palm, a double-shot Americano will do the trick.<\/p><p>You can read more about Gina on <a href=\"http:\/\/www.ginamcclain.com\/\">her blog<\/a>, follow her on <a href=\"http:\/\/twitter.com\/gina_mcclain\">Twitter<\/a>, or \"friend\"  on <a href=\"http:\/\/www.facebook.com\/gina.mcclain\">Facebook<\/a>.<\/p>",
            'sort' => 400,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'ident' => 'jennifer-rose',
            'first_name' => 'Jennifer',
            'last_name' => 'Rose',
            'display_name' => 'Jennifer Rose',
            'title' => "Assistant to the Pastor of Leadership Development ",
            'email' => 'JenniferR@faithpromise.org',
            'phone_ext' => '1100',
            'bio' => "",
            'sort' => 910,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'leadership')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'miles-creasman',
            'first_name' => 'Miles',
            'last_name' => 'Creasman',
            'display_name' => 'Miles Creasman',
            'title' => "Next Steps Pastor\/Blount Groups Pastor",
            'email' => 'MilesC@faithpromise.org',
            'phone_ext' => '1005',
            'bio' => "<p>Miles Creasman has been on staff as the Blount Campus Groups Director since June 2010 and also took on the role of Pastor of Next Steps in the middle of 2011. Originally from Riceville, TN, Miles is a graduate of Carson-Newman College and Southern Baptist Theological Seminary in Louisville, KY. He has been in ministry for 15 years and has served on church staffs as Recreation Minister, Middle & High School Pastor, and Singles Pastor.<\/p><p>Miles has a passion to help people grow in their relationship with the Lord, and he believes that the context of community found in groups is the best place for that to happen.<\/p><p>Miles has been married to Katy for 13 years, and they have 3 children - Jess (9), Will (7), and Leah (3).<\/p><p>Miles' favorite hobby is playing with his kids. He loves playing Frisbee golf & fantasy sports. Miles and Katy are both very big UT Vols fans and love to go to games whenever they can.<\/p>",
            'sort' => 770,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'rob-patrick',
            'first_name' => 'Rob',
            'last_name' => 'Patrick',
            'display_name' => 'Rob Patrick',
            'title' => "Pellissippi Campus Groups Pastor",
            'email' => 'RobP@faithpromise.org',
            'phone_ext' => '1005',
            'bio' => "<p>Rob is originally from Castlewood, VA, a small town in a rural part of Southwest Virginia. He moved from Virginia to Kansas City in 1984 and then to Knoxville in 1986 for his then current job working in the engineering, testing and exploration industry. Rob served as an upper-level manager in the last half of his 33 years in that field of work. He married Jennifer in July of 1988, and they have two children, Adam (26) and Brittany (22).<\/p><p>Rob grew up in a Christian home and began his Christian walk at twelve years old. He began serving in his church and doing ministry at a very early age. Rob served in a number of leadership and ministry roles in the previous two churches he attended here in Knoxville where he served in their children's ministry, worship ministry, and as Chairman of the Leadership Team. He has been attending Faith Promise Church since January 2002. Soon afterward attending for the first time, he and his family attended a small group, which began his love for small group ministry. He started out as a volunteer Leader in Small Group Ministry, became a Groups Coach, then served as Community Pastor. He also served on the church's Leadership Team before coming on staff in 2011.<\/p><p>Rob has a passion for people and for them to experience life change. He believes that happens best in circles and not rows. He spent a lot of his life in rows growing up and he now believes he experienced his greatest life change in a group. Rob wants everyone to be able to experience the same life change through groups that he experienced. He believes that group life is where God helped him to really begin to understand the Gospel, and the calling on his life to become a disciple and a disciple maker.<\/p><p>In his free time, he and his wife, Jennifer love to spend time at the lake with friends and family and make frequent visits to the Smoky Mountains. Rob loves fishing, boating, and watching sports. He is a UT Vols, Kansas City Chiefs, and Royals fan.<\/p>",
            'sort' => 520,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'ident' => 'brenda-moore',
            'first_name' => 'Brenda',
            'last_name' => 'Moore',
            'display_name' => 'Brenda Moore',
            'title' => "Receptionist",
            'email' => 'BrendaM@faithpromise.org',
            'phone_ext' => '1000',
            'bio' => "<p>I was married to my high school sweetheart for 37 1\/2 years. My late husband, Terry, and I served in the ministry together for over 30 years. We have four grown sons and five grandchildren (3 boys and 2 girls).<\/p><p>Terry and Pastor Chris were friends and frequently met together. Terry often said, \"If we didn't have a church of our own, we would be at Faith Promise.\" When he was killed in an accident on July 4th of 2009, I realized that I was too distracted to worship at the church my husband and I had started in Clinton, TN. So in the fall of 2009, I began to attend Faith Promise on my own.<\/p><p>I felt God calling me to be a part of Faith Promise's staff when I began to feel a restlessness in my spirit at my former job. As I prayed about that restlessness, it became very clear to me that I was to be on staff, but I didn't know where God was going to put me. One morning during my quiet time, I felt the restlessness in an even greater way. I asked God, \"What are you trying to tell me? Why am I suddenly so discontent where I am?\"<\/p><p>That very afternoon I got a call from my youngest son who told me he had been on FP's website and had found the perfect job for me. I went home, got online, and applied for the Receptionist's position. Several interviews and a couple of months later, I received a call that I was being offered the job. I accepted on the spot. I began working at Faith Promise in the fall of 2011. What a blessing it has been to be a part of this team!<\/p><p>I am involved in fpWomen's Groups as part of the Leadership Team. I also lead women's Bible studies and serve as a baptism assistant.<\/p><p>In my spare time, I love to be with my family-especially with my grandchildren. I also love to read and travel and have a heart for missions.<\/p><p>I am deathly afraid of snakes! I have been known to do a wicked snake dance upon spotting one.<\/p>",
            'sort' => 780,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jamie-davis',
            'first_name' => 'Jamie',
            'last_name' => 'Davis',
            'display_name' => 'Jamie Davis',
            'title' => "fpKids Team Administrator",
            'email' => 'JamieD@faithpromise.org',
            'phone_ext' => '1203',
            'bio' => "<p>All of my life, God has been pulling and pushing me toward living a life centered on Him. It has been a life-long dream of mine to be part of a children's ministry. When God led me to Faith Promise, my family and I were willing and ready to go wherever He wanted us to be. I am thrilled, blessed, and so very grateful to be a part of this wonderful church family.<\/p><p>My family's motto is to trust an unknown future to an all-knowing God.<\/p><p>We have another love at our house, and it is our love for adoption. My wife and I traveled to China in 2008 to bring home our beautiful daughter, Lily Grace. Since that time, my love for Asian missions has grown tremendously. I have been on one mission trip to Asia, and I am preparing to lead my second one within the next few months.<\/p><p>I love serving all of our children at Faith Promise. It is my desire to guide each child into the beginning of the biggest, most important love story of their lives - their relationship with Christ.<\/p>",
            'sort' => 420,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'dustin-scott',
            'first_name' => 'Dustin',
            'last_name' => 'Scott',
            'display_name' => 'Dustin Scott',
            'title' => "Pastor of Group Leader Discipleship",
            'email' => 'DustinS@faithpromise.org',
            'phone_ext' => '1302',
            'bio' => "",
            'sort' => 550,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'anderson')->first()->id,
            'ident' => 'mike-baker',
            'first_name' => 'Mike',
            'last_name' => 'Baker',
            'display_name' => 'Mike Baker',
            'title' => "North Knoxville Campus Pastor",
            'email' => 'MikeB@faithpromise.org',
            'phone_ext' => '1708',
            'bio' => "",
            'sort' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'pastors')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'john-adams',
            'first_name' => 'John',
            'last_name' => 'Adams',
            'display_name' => 'John Adams',
            'title' => "Blount Campus Worship Pastor",
            'email' => 'JohnA@faithpromise.org',
            'phone_ext' => '1506',
            'bio' => "",
            'sort' => 301,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'zach-carringer',
            'first_name' => 'Zach',
            'last_name' => 'Carringer',
            'display_name' => 'Zach Carringer',
            'title' => "Worship Intern",
            'email' => 'ZachC@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 290,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'tonja-breaux',
            'first_name' => 'Tonja',
            'last_name' => 'Breaux',
            'display_name' => 'Tonja Breaux',
            'title' => "Student Ministry Assistant",
            'email' => 'TonjaB@faithpromise.org',
            'phone_ext' => '1305',
            'bio' => "",
            'sort' => 310,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);


        $staff_member = new Staff([
            'ident' => 'kelsey-arnold',
            'first_name' => 'Kelsey',
            'last_name' => 'Arnold',
            'display_name' => 'Kelsey Arnold',
            'title' => "Assistant to the Pastor of Outreach and Missions",
            'email' => 'KelseyA@faithpromise.org',
            'phone_ext' => '1408',
            'bio' => "<p>Hi! My name is Kelsey. My husband and I have been attending Faith Promise for a little over a year now. In April of this year I was granted an amazing opportunity to come on staff as the Assistant to the Pastor of Outreach and Missions. I have always had a passion for serving others and absolutely LOVE what I do. I love to laugh and have a good time.<\/p><p>When I am not in the office, I enjoy spending time with my friends and family. I also like to spend time outdoors, whether I am kayaking, riding my bike (which I'm terrible at), or sitting down to read a good book, there's nothing better than the warmth of the sun beaming down on my skin.<\/p>",
            'sort' => 540,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'missions')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'mallory-ellis',
            'first_name' => 'Mallory',
            'last_name' => 'Ellis',
            'display_name' => 'Mallory Ellis',
            'title' => "Accounting Director & Human Resources Director",
            'email' => 'MalloryE@faithpromise.org',
            'phone_ext' => '1603',
            'bio' => "<p>I'm from Jackson, TN. I grew up with an amazing godly family who took us to church every time the doors were open and taught me the importance of serving. I moved to Knoxville in 2004 to attend UT, where I majored in pretty much everything but finally settled on Accounting. :)<\/p><p>I met Mike my first semester here, and we quickly became friends. We didn't start dating until we worked together as missionaries the summer of 2007 at Montgomery Village Baptist Center. We were both interns at our local church, and after we got married in May 2009, a couple (the Beukemas) invited us to FPC, and it has been AWESOME to be a part of this church!<\/p>",
            'sort' => 740,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'hope-hall',
            'first_name' => 'Hope',
            'last_name' => 'Hall',
            'display_name' => 'Hope Hall',
            'title' => "fpKids Elementary Director",
            'email' => 'HopeH@faithpromise.org',
            'phone_ext' => '',
            'bio' => "<p>Hope Hall joined the Blount County fpKids Team as the Elementary Director. She was a Middle School Teacher for five years before joining the staff of TrueNorth church where she served as the Children's Director for two years. She moved to Tennessee from North Augusta, SC, in 2009.<\/p><p>Hope has been married to Dustin for thirteen years, and they have five children: Carson - 10, Abby - 9, Tristan - 7, Bryson - 6, and Maddy - 4. She loves children and is very excited about building a biblical foundation for families at the Faith Promise Blount Campus.<\/p>",
            'sort' => 440,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'aimee-fair',
            'first_name' => 'Aimee',
            'last_name' => 'Fair',
            'display_name' => 'Aimee Fair',
            'title' => "fpKids Preschool Director",
            'email' => 'AimeeF@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 450,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'macy-deel',
            'first_name' => 'Macy',
            'last_name' => 'Deel',
            'display_name' => 'Macy Deel',
            'title' => "Next Steps Assistant",
            'email' => 'MacyD@faithpromise.org',
            'phone_ext' => '1711',
            'bio' => "<p>Hi! My name is Macy Deel, and I've been attending Faith Promise for the past two and a half years with my family. I grew up in church, and have had a relationship with the Lord since an early age. I was even blessed enough to have Miles Creasman, our Next Steps Pastor\/Blount Campus Groups Pastor, as my youth pastor while growing up!<\/p><p>Since first attending Faith Promise I have felt so connected and tied to this church, and it has helped me to continually work on strengthening my relationship with Christ. I also volunteer in fpKids, our children's ministry, and have loved giving children the opportunity to learn about the Lord. I am so excited about the plans that God has for Faith Promise Church and spreading His Word, and I am thankful to be a part of it!<\/p><p>I've lived in Knoxville since I was four years old, graduated from Bearden High School, and am currently a senior at UT. I'm studying Psychology and Child and Family Studies. Although I'm not yet sure what I'd like to do with my major, I trust that God will place me right where He wants me!<\/p><p>Outside of school, I enjoy spending time with my friends and family and going to the pool and lake. I also love seeing movies, drinking Coca Cola, playing the Wii, going to Disneyworld, eating Italian food, and traveling.<\/p>",
            'sort' => 775,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'chad-funk',
            'first_name' => 'Chad',
            'last_name' => 'Funk',
            'display_name' => 'Chad Funk',
            'title' => "Campbell Campus Pastor",
            'email' => 'ChadF@faithpromise.org',
            'phone_ext' => '1410',
            'bio' => "<p>Chad was born and raised in Iowa. In 1997 he married his wife Brandi, and they have a daughter named Taylor. After a seventeen-year battle with strongholds, Chad gave his life to Jesus in December of 2006. Since that time he has been radically pursuing the Lord. Chad and his family made the move Tennessee in the summer of 2008 for his job. Chad and his family have been attending Faith Promise since 2009.<\/p><p>Chad has a background in mechanical contracting and worked in that field for over fifteen years. In the fall of 2009 Chad felt God was taking him in a different direction, and in December of 2011 he graduated from Liberty University. Chad is excited about the opportunity that God has given him to serve in full-time ministry and can't wait to see what God has planned!<\/p><p>Chad enjoys hanging out with his family and friends. He also enjoys mild running (close to mall walking). He loves cookies and is a huge fan of the Green Bay Packers. Go Pack Go!<\/p><p>Connect with Chad on <a href=\"https:\/\/twitter.com\/chadjfunk\" target=\"_blank\">Twitter<\/a>, <a href=\"http:\/\/www.facebook.com\/chad.funk.3\" target=\"_blank\">Facebook<\/a>, or <a href=\"http:\/\/chadjfunk.com\/\" target=\"_blank\">his blog<\/a>.<\/p>",
            'sort' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'pastors')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'celebrate')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jeff-rose',
            'first_name' => 'Jeff',
            'last_name' => 'Rose',
            'display_name' => 'Jeff Rose',
            'title' => "Building Services Director",
            'email' => 'JeffR@faithpromise.org',
            'phone_ext' => '1703',
            'bio' => "<p>Jeff has been a member of FPC since the very beginning of the church, and has served in various areas before joining the staff in September 2012. Jeff's background includes Maintenance Supervisor for the Boys & Girls Club of TN Valley. He loves sports, traveling, and action movies.<\/p><p>He and his wife Robyn live in the Hardin Valley area with their two dogs Sophie and Charlie. They have one daughter, Jennifer, who is also on FPC staff as Assistant to the Pastor of Family Ministries.<\/p>",
            'sort' => 800,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'ann-slimp',
            'first_name' => 'Ann',
            'last_name' => 'Slimp',
            'display_name' => 'Ann Slimp',
            'title' => "Staff Counselor",
            'email' => 'AnnS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "<p>Ann is a licensed psychologist who integrates her faith in God with her professional skills to minister to people through her role as a counselor.<\/p><p>She received her Ph.D. in psychology, at Auburn University in 1991 and has been licensed in TN since 1992.<\/p><p>She has two awesome children - a daughter who is 18 and a son who is 15. They continue to be her greatest teachers.<\/p><p>She has been a Christian since her childhood and continues to be astounded at God's abundant grace in her life. <\/p>",
            'sort' => 810,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'care')->first()->id);


        $staff_member = new Staff([
            'ident' => 'sara-fulton',
            'first_name' => 'Sara',
            'last_name' => 'Fulton',
            'display_name' => 'Sara Fulton',
            'title' => "Staff Counselor",
            'email' => 'SaraF@faithpromise.org',
            'phone_ext' => '',
            'bio' => "<p>My name is Sara Fulton, and my family and I have been attending Faith Promise since 2011. I am originally from Atlanta, GA, and I have been living in Knoxville since 2003 when I moved here for college.<\/p><p>I have had a passion for counseling and reaching out to others since I was a child. I graduated with my Bachelor's from Johnson University and my Master's from Argosy University. I am hoping to obtain my license in professional counseling in the next few years and will one day return to school to obtain my Ph.D. My goal is to gain all that I can in order to best serve those that I work with. My desire is to love God and to serve others to His glory and purpose.<\/p><p>My husband and I have been married for five years and we have a beautiful daughter who is almost two. We have three crazy dogs and love animals. We love to be outdoors and spending time with family and friends.<\/p>",
            'sort' => 820,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'care')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'anderson')->first()->id,
            'ident' => 'kevin-simcoe',
            'first_name' => 'Kevin',
            'last_name' => 'Simcoe',
            'display_name' => 'Kevin Simcoe',
            'title' => "North Knox Groups Pastor",
            'email' => 'KevinS@faithpromise.org',
            'phone_ext' => '1411',
            'bio' => "<p>Kevin moved to Knoxville with his family in 1996. After attending and serving in a number of roles at a local church for 11 years, he and his family felt a call to serve God in new and deeper ways and were led to Faith Promise in 2007.<\/p><p>From 2008-2012 he served in leadership with men's groups and events. In 2011 he joined the leadership team of fpCelebrate where he continues to serve today. In December of 2012, Kevin joined the staff in a volunteer role as the Groups Pastor at the North Knox Campus.<\/p><p>Kevin lives in West Knoxville with his wife of 26 years (Isabell) and his three sons; Ryan, Travis, and Graham.<\/p>",
            'sort' => 524,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'celebrate')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'campbell')->first()->id,
            'ident' => 'sid-spiva',
            'first_name' => 'Sid',
            'last_name' => 'Spiva',
            'display_name' => 'Sid Spiva',
            'title' => "Anderson Campus Pastor",
            'email' => 'SidS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "<p>Sid is a lifelong resident of Clinton and Anderson County. After working in Anderson County Schools for 32 years as a High School Teacher and Principal, Sid entered full time ministry in 2008. He joined the Faith Promise staff when the Anderson County Campus opened in 2013.<\/p><p>Sid and his wife Judy of 40 years have two outstanding sons, two wonderful daughter-in-laws, and two awesome grandsons.<\/p><p>He enjoys traveling, riding motorcycles, music, and spending time with family.<\/p>",
            'sort' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'pastors')->first()->id);


        $staff_member = new Staff([
            'ident' => 'travis-spiva',
            'first_name' => 'Travis',
            'last_name' => 'Spiva',
            'display_name' => 'Travis Spiva',
            'title' => "Campbell Worship Pastor",
            'email' => 'TravisS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 218,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'campbell')->first()->id,
            'ident' => 'ryan-silowski',
            'first_name' => 'Ryan',
            'last_name' => 'Silowski',
            'display_name' => 'Ryan Silowski',
            'title' => "Anderson Campus Student Pastor",
            'email' => 'RyanS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "<p>I was born in New Orleans, LA, and moved to east Tennessee in the early 2000's. I was home schooled for all twelve years of my primary education, and after high school I went to Johnson Bible College (now Johnson University).<\/p><p>I graduated in 2013 with a Bachelors of Science in Biblical Studies and Digital Video Production. I have always had a love for storytelling, and video is the primary way we communicate stories in this day in age. I have loved films and filmmaking for some time.<\/p><p>In college I spent two summers in Seattle, WA, and it quickly became a second home for me. In my senior year of college, I had the privilege to be a Director of Photography for a small Christian feature film made in the Knoxville area. I have also participated in several competitions for the Knoxville film festival.<\/p><p>Through some of my internships in college, I became the Student Pastor at Life Point Church. In September of 2013, Life Point became a Faith Promise Campus, and I stayed on in my role of Student Pastor.<\/p>",
            'sort' => 320,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);


        $staff_member = new Staff([
            'ident' => 'micah-stephens',
            'first_name' => 'Micah',
            'last_name' => 'Stephens',
            'display_name' => 'Micah Stephens',
            'title' => "Creative Director",
            'email' => 'MicahS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 220,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'phil-holloway',
            'first_name' => 'Phil',
            'last_name' => 'Holloway',
            'display_name' => 'Phil Holloway',
            'title' => "Vocal Coordinator & Worship Associate",
            'email' => 'PhilH@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 280,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'tiffany-reid',
            'first_name' => 'Tiffany',
            'last_name' => 'Reid',
            'display_name' => 'Tiffany Reid',
            'title' => "fpKids Team Administrator",
            'email' => 'TiffanyR@faithpromise.org',
            'phone_ext' => '1205',
            'bio' => "",
            'sort' => 430,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'chris-looper',
            'first_name' => 'Chris',
            'last_name' => 'Looper',
            'display_name' => 'Chris Looper',
            'title' => "fpStudents Venue & Creative Director",
            'email' => 'ChrisL@faithpromise.org',
            'phone_ext' => '1300',
            'bio' => "",
            'sort' => 340,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);


        $staff_member = new Staff([
            'ident' => 'suzanne-spiva',
            'first_name' => 'Suzanne',
            'last_name' => 'Spiva',
            'display_name' => 'Suzanne Spiva',
            'title' => "Campbell Campus fpKids Director",
            'email' => 'SuzanneS@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 430,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'ident' => 'jordan-peltz',
            'first_name' => 'Jordan',
            'last_name' => 'Peltz',
            'display_name' => 'Jordan Peltz',
            'title' => "Video Project Support",
            'email' => 'JordanP@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 240,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'adam-chapman',
            'first_name' => 'Adam',
            'last_name' => 'Chapman',
            'display_name' => 'Adam Chapman',
            'title' => "Video Project Manager",
            'email' => 'AdamC@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 230,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'jennifer-spencer',
            'first_name' => 'Jennifer',
            'last_name' => 'Spencer',
            'display_name' => 'Jennifer Spencer',
            'title' => "Volunteer Coordinator of Support Teams",
            'email' => 'JenniferS@faithpromise.org',
            'phone_ext' => '1402',
            'bio' => "",
            'sort' => 435,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'ident' => 'rick-henry',
            'first_name' => 'Rick',
            'last_name' => 'Henry',
            'display_name' => 'Rick Henry',
            'title' => "Campbell Campus Groups Director",
            'email' => 'RickH@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 560,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'ident' => 'tanner-dalton',
            'first_name' => 'Tanner',
            'last_name' => 'Dalton',
            'display_name' => 'Tanner Dalton',
            'title' => "Central Worship Associate",
            'email' => 'TannerD@faithpromise.org',
            'phone_ext' => '1507',
            'bio' => "",
            'sort' => 270,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'anderson')->first()->id,
            'ident' => 'noah-case',
            'first_name' => 'Noah',
            'last_name' => 'Case',
            'display_name' => 'Noah Case',
            'title' => "North Knox Student Pastor",
            'email' => 'NoahC@faithpromise.org',
            'phone_ext' => '1306',
            'bio' => "",
            'sort' => 330,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'blount')->first()->id,
            'ident' => 'michelle-hearon',
            'first_name' => 'Michelle',
            'last_name' => 'Hearon',
            'display_name' => 'Michelle Hearon',
            'title' => "Blount Campus Administrative Assistant",
            'email' => 'MichelleH@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 305,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'rachel-duncan',
            'first_name' => 'Rachel',
            'last_name' => 'Duncan',
            'display_name' => 'Rachel Duncan',
            'title' => "Assistant to Worship and Creative Arts Leader",
            'email' => 'RachelD@faithpromise.org',
            'phone_ext' => '1508',
            'bio' => "",
            'sort' => 200,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'pel')->first()->id,
            'ident' => 'annalee-peltz',
            'first_name' => 'AnnaLee',
            'last_name' => 'Peltz',
            'display_name' => 'AnnaLee Peltz',
            'title' => "Volunteer Coordinator-Elementary Small Groups",
            'email' => 'AnnaLeeP@faithpromise.org',
            'phone_ext' => '1201',
            'bio' => "",
            'sort' => 590,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpkids')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpkids')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'campbell')->first()->id,
            'ident' => 'tom-conley',
            'first_name' => 'Tom',
            'last_name' => 'Conley',
            'display_name' => 'Tom Conley',
            'title' => "Anderson Campus Groups Pastor",
            'email' => 'tom4biz3@comcast.net',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 522,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'groups')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'groups')->first()->id);


        $staff_member = new Staff([
            'campus_id' => Campus::where('ident', '=', 'anderson')->first()->id,
            'ident' => 'brandon-dunford',
            'first_name' => 'Brandon',
            'last_name' => 'Dunford',
            'display_name' => 'Brandon Dunford',
            'title' => "North Knox Worship Director",
            'email' => 'BrandonD@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 215,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'worship')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'worship')->first()->id);


        $staff_member = new Staff([
            'ident' => 'brad-roberts',
            'first_name' => 'Brad',
            'last_name' => 'Roberts',
            'display_name' => 'Brad Roberts',
            'title' => "Web Developer",
            'email' => 'bradr@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 765,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'administration')->first()->id);


        $staff_member = new Staff([
            'ident' => 'brett-kleinhans',
            'first_name' => 'Brett',
            'last_name' => 'Kleinhans',
            'display_name' => 'Brett Kleinhans',
            'title' => "Campbell Campus Student Pastor",
            'email' => 'BrettK@faithpromise.org',
            'phone_ext' => '',
            'bio' => "",
            'sort' => 350,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $staff_member->save();
        $staff_member->teams()->attach(\App\Team::where('ident', '=', 'fpstudents')->first()->id);
        $staff_member->ministries()->attach(\App\Ministry::where('ident', '=', 'fpstudents')->first()->id);

    }
}
