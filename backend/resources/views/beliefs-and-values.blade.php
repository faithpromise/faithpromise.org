@extends('layouts.page', ['title' => 'Beliefs and Values', 'hero_image' => 'images/general/bible-wide.jpg'])

@section('page')

    @introsection(['title' => 'Our Vision', 'class' => '', 'buttons' => [
        [
            'title' => 'Beliefs',
            'url' => '#beliefs'
        ],
        [
            'title' => 'Values',
            'url' => '#values'
        ]
    ]])
    <p>Our vision is to impact the unchurched of the world for God, starting in our surrounding counties.</p>
    <p>Our purpose is to honor the Lord Jesus Christ by enjoying Him and partnering with Him to build His church.</p>
    <p>The mission of Faith Promise Church is to lead people into experiencing and growing their relationship with God.</p>
    <p>Our strategy is to create relevant environments where people can meet with God, experience community with believers, and reach their potential.</p>
    @endintrosection

    @textsection(['title' => 'Our Values', 'id' => 'values'])
    <h5>People are our priority:</h5>
    <p>We believe that the lost matter more! Jesus said, <em>"Leave the ninety-nine and go and find the one lost sheep."</em> His commission is clear to all Christ followers: <em>"Make disciples of all nations...."</em> We will do everything better in heaven except win the lost. Our focus is not buildings or programs, but people. Jesus died for people, and they are our priority. We will continue to add sites, seats, and services to make it hard to go to hell from East Tennessee.</p>

    <h5>Families are our foundation:</h5>
    <p>We believe the first thing God instituted in His brand new world was the family. Marriage between one man and one woman is His building block for civilization, and we believe it is the best place for spiritual growth. We partner with families to help build great marriages and help disciple children. Our goal is to add value to families, and never distract or take the place of the home.</p>

    <h5>Gathering for our God:</h5>
    <p>We believe in gathering for corporate public worship. We gather in large groups for celebration, exhortation, and motivation. We meet in home groups for community, discipleship, accountability, and ministry. Both gatherings are essential for spiritual development and formation. Without these gatherings, believers miss the potential placed in them by God.</p>

    <h5>God gets the last word:</h5>
    <p>We believe that the Bible is the inerrant, infallible, God-breathed Word for us. The Bible is our sole source of authority. It is our guiding light and our map for here and eternity. There is no other book or revelation to compare. It is the bottom line for all we do.</p>

    <h5>Developing heaven's heart - Generosity:</h5>
    <p>We believe that our God has a generous heart. <em>"For God so loved the world He gave...."</em> He is most honored when we develop the same attribute. At Faith Promise we strive to teach every person to tithe his or her income and go beyond in giving to our Lord. God blesses sacrifice and generosity.</p>

    <h5>Serving is His strategy:</h5>
    <p>We believe every believer is called to serve and given a spiritual gift. Any believer not serving cannot be totally fulfilled. It is our goal to help every person at Faith Promise find his or her gift and use it within the Body of Christ. <em>"God has given each of you a gift from his great variety of spiritual gifts. Use them well to serve one another." I Peter 4:10</em></p>

    <h5>Missions are our mandate:</h5>
    <p>We believe God has called His Church to be His hands and feet as well as His voice here on this planet. We are all called to be on mission locally and globally. We care for the lost, hurting, and poor wherever we find them.</p>
    @endtextsection

    @textsection(['title' => 'Core Beliefs', 'class' => 'Section--lightGrey', 'id' => 'beliefs'])
    <p>At Faith Promise, we hold to the following core beliefs:</p>
    <ol>
        <li>
            <p><strong>About God</strong> - God is the Creator and Ruler of the universe. He has eternally existed in three personalities: the Father, the Son, and the Holy Spirit. These three are co-equal and are one God.  <span class="scripture-list"><?= bible_verses('Genesis 1:1, 26, 27, 3:22; Psalm 90:2; Matthew 28:19; 1 Peter 1:2; 2 Corinthians 13:14') ?></span></p>
        </li>
        <li>
            <p><strong>About Jesus Christ</strong> - Jesus Christ is the Son of God. He is co-equal with the Father. Jesus lived a sinless human life and offered Himself as the perfect sacrifice for the sins of all people by dying on a cross. He arose from the dead after three days to demonstrate His power over sin and death. He ascended to Heaven's glory and will return again someday to earth to reign as King of Kings and Lord of Lords.  <span class="scripture-list"><?= bible_verses('Matthew 1:22-23; Isaiah 9:6; John 1:1-5, 14:10-30; Hebrews 4:14-15; 1 Corinthians 15:3-4; Romans 1:3-4; Acts 1:9-11; 1 Timothy 6:14-15; Titus 2:13') ?></span></p>
        </li>
        <li>
            <p><strong>About the Holy Spirit</strong> - The Holy Spirit is co-equal with the Father and the Son of God. He is present in the world to make men aware of their need for Jesus Christ. He also lives in every Christian from the moment of salvation. He provides the Christian with power for living, understanding of spiritual truth, and guidance in doing what is right. He gives all believers a spiritual gift when they are saved. As Christians, we seek to live under His control daily.  <span class="scripture-list"><?= bible_verses('2 Corinthians 3:17; John 16:7-13, 14:16-17; Acts 1:8; 1 Corinthians 2:12, 3:16; Ephesians 1:13; Galatians 5:25; Ephesians 5:18') ?></span></p>
        </li>
        <li>
            <p><strong>About the Bible</strong> - The Bible is God's Word to us. It was written by human authors, under the supernatural guidance of the Holy Spirit. It is the supreme source of truth for Christian beliefs and living. Because it is inspired by God, it is the truth without error.  <span class="scripture-list"><?= bible_verses('2 Timothy 3:16; 2 Peter 1:20-21; 2 Timothy 1:13; Psalm 119:105, 160, 12:6; Proverbs 30:5') ?></span></p>
        </li>
        <li>
            <p><strong>About Human Beings</strong> - People are made in the spiritual image of God, to be like Him in character. People are the supreme object of God's creation. Although every person has tremendous potential for good, all of us are marred by an attitude of disobedience toward God called "sin." This attitude separates people from God and causes all problems in life.  <span class="scripture-list"><?= bible_verses('Genesis 1:27; Psalm 8:3-6; Isaiah 53:6; Romans 3:23; Isaiah 59:1-2') ?></span></p>
        </li>
        <li>
            <p><strong>About Salvation</strong> - Salvation is God's free gift to us but we must accept it. We can never make up for our sin by self-improvement or good works. Only by trusting in Jesus Christ as God's offer of forgiveness can anyone be saved from sin's penalty. When we turn from our self-ruled life and turn to Jesus in faith, we are saved. Eternal life begins the moment one receives Jesus Christ into his life by faith.  <span class="scripture-list"><?= bible_verses('Romans 6:23; Ephesians 2:8-9; John 14:6, 1:12; Titus 3:5; Galatians 3:26; Romans 5:1') ?></span></p>
        </li>
        <li>
            <p><strong>About Eternal Security</strong> - Because God gives us eternal life through Jesus Christ, the true believer is secure in that salvation for eternity. If you have been genuinely saved, you cannot "lose" it. Salvation is maintained by the grace and power of God, not by the self-effort of the Christian. It is the grace and keeping power of God that gives us this security.  <span class="scripture-list"><?= bible_verses('John 10:29; 2 Timothy 1:12; Hebrews 7:25, 10:10, 14; 1 Peter 1:3-5') ?></span></p>
        </li>
        <li>
            <p><strong>About Eternity</strong> - People were created to exist forever. We will exist either eternally separated from God by sin, or eternally with God through forgiveness and salvation. To be eternally separated from God is Hell. To be eternally in union with Him is eternal life. Heaven and Hell are real places of eternal existence.  <span class="scripture-list"><?= bible_verses('John 3:16; John 14:17; Romans 6:23; Romans 8:17-18; Revelation 20:15; 1 Corinthians 2:7-9') ?></span></p>
        </li>
        <li>
            <p><strong>About Family</strong> - Marriage is the uniting of one man and one woman in covenant commitment for a lifetime. It is God's unique gift to reveal the union between Christ and His church and to provide for the man and the woman in marriage the framework for intimate companionship and the means for procreation of the human race. Children, from the moment of conception, are a blessing and heritage from the Lord. <span class="scripture-list"><?= bible_verses('Genesis 1:26-28, 2:15-25, 3:1-20; Exodus 20:12; Deuteronomy 6:4-9; Joshua 24:15; 1 Samuel 1:26-28; Psalms 51:5, 78:1-8, 127, 128, 139:13-16; Proverbs 1:8, 5:15-20, 6:20-22, 12:4, 13:24, 14:1, 17:6, 18:22, 22:6, 22:15, 23:13-14, 24:3, 29:15, 29:17, 31:10-31; Ecclesiastes 4:9-12, 9:9; Malachi 2:14-16; Matthew 5:31-32, 18:2-5, 19:3-9; Mark 10:6-12; Romans 1:18-32; 1 Corinthians 7:1-16; Ephesians 5:21-33, 6:1-4; Colossians 3:18-21; 1 Timothy 5:8, 5:14; 2 Timothy 1:3-5; Titus 2:3-5; Hebrews 13:4; 1 Peter 3:1-7') ?></span></p>
        </li>
    </ol>
    @endtextsection

@endsection