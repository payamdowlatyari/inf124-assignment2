<?php
    require_once "dbconnect.php";
    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Basketball', 'NBA AND NCAA-APPROVED BASKETBALL', 'baseketball.jpg', 'Sports Balls', '23.99', '<p>NBA and NCAA-approved Basketball.<br />
Become like one of the pros with this NBA-approved Basketball! Improved durable exterior for extend play.
Great for indoor or outdoor games.</p>
<ul>
<li>For indoor/outdoor play</li>
<li>Ideal size for adults</li>
<li>Composite cover for various surfaces</li>
<li>Replica NBA Basketball</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Soccer Ball', 'NFHS AND NCAA-APPROVED SOCCER BALL', 'soccer.jpg', 'Sports Balls', '49.99', '<p>NFHS and NCAA-approved Soccer ball. <br />
Standard 6-panel construction with original look and feel. Thermal bonded construction allow for a
more realistic trajectory and better touch.</p>
<ul>
<li>100% polyurethane cover</li>
<li>Textured surface for performance and mobility</li>
<li>FIFA Quality Pro certified</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Tennis Balls', '6 CAN PACK OF TENNIS BALLS. 3 BALLS PER CAN', 'tennis.jpeg', 'Sports Balls', '15.99', '<p>6 can pack of Tennis balls. 3 balls per can. <br />
Our Tennis Balls are officially approved by USTA® League Tennis. For use on hard tennis courts, they are built
with natural rubber for good feel and shock resistance. The wool fiber composition increases durability for
longer play and reduces cracking. This multi-pack provides all the equipment you need from one seasonto the next.</p>
<ul>
<li>6 pack (18 balls)</li>
<li>USTA League Tennis standard</li>
<li>Wool fiber for longer wear</li>
<li>Rubber construction for consistent feel</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Cricket Balls', '6 PACK OF CRICKET BALLS. ACF-APPROVED CRICKET BALLS', 'cricketBall.jpeg', 'Sports Balls', '39.99', '<p>6 pack of Cricket balls. ACF-APPROVED. <br />
Made for professional-level play, these Cricket balls provides you with standard four-piece leather
construction and quality stitching for extended, aggressive matches.</p>
<ul>
<li>Official Match Balls</li>
<li>Provides pinpoint accuracy when bowling or batting</li>
<li>Averages 30 overs</li>
<li>Weight: 5.5 oz.</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Golf Balls', 'SET OF 6 CALLWAY TOUR GOLF BALLS', 'goldBall.jpg', 'Sports Balls', '39.99', '<p>Set of 6 Callway Tour Golf balls.<br />
These Callaway Golf Balls combine Tour-proven performance with unparalleled feel and exceptional mis-hit
forgiveness. A high-speed Mantle system delivers fantastic feel, shot-controlling spins, and scoring shots.
</p>
<ul>
<li>Triple Track Technology lines to improve putting accuracy</li>
<li>Larger inner core maximizes compression energy while promoting high launch for longer distance</li>
<li>Thinner, more resilient Tour Urethane cover delivers increased ball speed</li>
<li>Weight: 5.5 oz.</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Basketball Hoop', 'NBA AND NCAA-APPROVED BASKETBALL HOOP', 'baseketballHoop.jpeg', 'Sports Equipment', '108.99', '<p>NBA and NCAA-approved Basketball Hoop for home use. <br />
Enjoy hours of fun with friends and family in your own driveway or backyard! This portable Basketball Hoop
allows you to move the hoop at your convinience. Turn your backyard into a home court for serious play or
place it in the driveway and have neighbors come over. Lower the rim down to 7.5 feet to accommodate
younger players and up to 10 feet for adults.</p>
<ul>
<li>7.5 ft - 10 ft adjustments</li>
<li>44\" backboard</li>
<li>5/8\" steel rim</li>
<li>Powder-coated steel pole for weather resistance</li>
<li>Base fills with sand or water to prevent movement</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Soccer Cleats', 'NFHS AND NCAA-APPROVED SOCCER CLEATS', 'soccerCleats.png', 'Sportswear', '49.99', '<p>NFHS and NCAA-approved Soccer Cleats <br />
Dominate the field with these fashionable, professional level Soccer cleats from Nike. Made with
micro-textures that enhance ball handling and equipped with a sturdy frame that provides traction and
fast movement.</p>
<ul>
<li>Synthetic material for fast-paced movement</li>
<li>Lining provides comfortable, snug fit</li>
<li>Provides traction on any surface</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Tennis Racket', 'UTSA APPROVED TENNIS RACKET', 'tennisRackets.jpg', 'Sports Accessories', '29.99', '<p>UTSA Approved Tennis Racket<br />
Whether your at practice or in a match, this Tennis Racket will enable you to control the court. Enhance your
game with stability and control from the extended handle.</p>
<ul>
<li>Pre-strung racket</li>
<li>Double Holes grommet for larger sweet spot</li>
<li>Perforated grip for secure hold</li>
<li>Lightweight for greater maneuverability</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Cricket Bat', 'ICC APPROVED CRICKET BAT', 'cricketBat.jpeg', 'Sports Accessories', '29.99', '<p>ICC Approved Cricket Bat <br />
Well-crafted blade with thick edges. This professional Cricket bat is suitable for adults with an
intermediate playing level.</p>
<ul>
<li>29.5 x 7.9 x 7.9 inches</li>
<li>3.6 pounds</li>
<li>Lightweight, easy pick-up</li>
<li>Same shape as top-tier bats</li>
</ul>')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products (name, summary, thumbnail, category, price, detail)
            VALUES ('Golf Club', 'UGSA APPROVED GOLF CLUB', 'golfClub.jpg', 'Sports Accessories', '69.99', '<p>UGSA Approved Golf Club. <br />
Execute all scoring shots with this one short game weapon. Equipped with an All-Terrain Versatility,
this wedge allows golfers to achieve greater success in any condition.</p>
<ul>
<li>Channels debris away from face for consistent spin</li>
<li>Micro-texture across the face generates additional spin</li>
<li>Provides exceptional feel, traction and stability on every shot</li>
<li>Synthetic rubber compound for durability and consistency</li>
</ul>')";
    $pdo->exec($sql);

    echo "Records inserted successfully";
?>