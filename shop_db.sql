CREATE TABLE users (
  id int(100) NOT NULL,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  user_type varchar(20) NOT NULL DEFAULT 'user',
  image varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO users(id,name,email,password,user_type,image) VALUES
(777, 'admin', 'admin@shoeworld.ca', '111', 'admin','admin.png');

CREATE TABLE cart (
  id int(100) NOT NULL,
  user_id int(100) NOT NULL,
  pid int(100) NOT NULL,
  name varchar(100) NOT NULL,
  price int(100) NOT NULL,
  quantity int(100) NOT NULL,
  image varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE message (
  id int(100) NOT NULL,
  user_id int(100) NOT NULL,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  number varchar(12) NOT NULL,
  message varchar(500) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE orders (
  id int(100) NOT NULL,
  user_id int(100) NOT NULL,
  name varchar(100) NOT NULL,
  number varchar(12) NOT NULL,
  email varchar(100) NOT NULL,
  method varchar(50) NOT NULL,
  address varchar(500) NOT NULL,
  total_products varchar(1000) NOT NULL,
  total_price int(100) NOT NULL,
  placed_on varchar(50) NOT NULL,
  payment_status varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE products (
  id int(100) NOT NULL,
  name varchar(100) NOT NULL,
  category varchar(20) NOT NULL,
  details varchar(500) NOT NULL,
  price int(100) NOT NULL,
  image varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO products (id, name, category, details, price, image) VALUES
(1, 'Nike Air Max 270', 'athletic', 'Introducing the first-ever Max Air unit designed specifically for Nike Sportswear, the Nike Air Max 270 delivers visible air and unbelievable comfort under every step. It has callbacks to the original 1991 Air Max 180 on its exaggerated tongue top and heritage tongue logo while also being upgraded for modern comfort.', 210, 'nikeairmax.png'),
(2, 'On Cloud Waterproof', 'athletic', 'The patented CloudTec cushioning couples with the Zero-Gravity foam for a featherweight stride as you push through your daily routine. Rain or shine, get your daily workout done with plush comfort in the ON Cloud Waterproof.', 190, 'oncloudrunning.png'),
(3, 'Reebok Premier Road', 'athletic', 'A blast from the past! Put your best foot forward with the Reebok Premier Road. Running-inspired shoes from 2009, these silhouettes return to take your days by storm with new colours and a soft DMX foam midsole. Reimagined for every day, the Reebok Premier Road brings style, comfort, and an unbeatable attitude to your strides.', 140, 'reebok.png'),
(4, 'Nike Zoom Lebron 3', 'basketball', 'Dribble your way to victory in the Nike Zoom LeBron 3. Paying homage to traditional barbershops, these shoes feature a spectrum of colourway straps and metallic details to give a fresh look. From the embroidered “BBZ” on the left toe to the Akron area code printed on the right toe, these LeBron-certified shoes take your game to new heights. Mystify opponents on the court with your explosive and pivoting moves in the Nike Zoom LeBron 3.', 235, 'nikelebron.png'),
(5, 'Jordan Air Jordan XXXVI Low', 'basketball', 'Walk in the footsteps of excellence with the Jordan Air Jordan XXXVI Low. Featuring the Leno-weave technique in the upper, these silhouettes keep you feeling comfortable and relaxed through each step. An expression of drive and energy that sparked a basketball revolution, the Jordan Air Jordan XXXVI Low lets you step on the court with confidence.', 230, 'jordanairlow.png'),
(6, 'Nike Air More Uptempo 96', 'basketball','Unapologetically bold with a whole lot of Nike Air! The Nike Air More Uptempo 96 captures the spirit of the ‘90s era with a chunky design and graffiti-styled distinctive branding. Popularized for the most encased Air during launch, this Nike pair flaunts its large Air Max unit with classic cushioning windows in the heel. With over 20 years of trailblazing history, this timeless design is just as bold, stylish, and sought-after as the original.', 225,'nikeairuptempo.png'),
(7, 'Nike Blazer Mid 77 Vintage','casual', 'Old-school vibes with a modern twist! Featuring a full leather upper with tonal suede overlays, the Nike Blazer Mid 77 Vintage offers a durable fit and a comfortable feel. The terry cloth footbed and leather-lined collar ensure cushiony comfort, while the original text logo on the heel tab provides a unique and bold look.', 140, 'nikevintage.png'),
(8, 'Converse UNT1TL3D High Top', 'casual', 'Wear the look of a legend, with a twist, in the Converse Chuck Taylor Not Chuck. The canvas/synthetic/textile upper gives you a look you already know you love.', 90, 'chucktaylorconverse.png'),
(9, 'Nike Air Force 1 07 Low','casual', 'A true sneaker royalty. The Nike Air Force 1 ‘07 is back with crisp leather, bold colors, and classic Nike cutlines. The upper comes with stitched leather overlays that stay true to their predecessor and deliver reliable support. The foam midsole offers the perfect amount of cushioning, while the perforations on the toe enhance airflow. Celebrate your love for all things Nike and B-ball in the Nike Air Force 1 ‘07.', 160, 'nikeairlow.png'),
(10, 'Birkenstock Arizona', 'sandals', 'Keep your feet cool and comfortable in the Birkenstock Arizona.', 140, 'birkenstockarizona.png'),
(11, 'Timberland Raycity Sandal', 'sandals', 'These sandals feature eco-friendly GreenStride comfort soles made of renewable materials, including sugarcane and responsible natural rubber, offering a sustainable, breathable, and comfortable feel. The Timberland Raycity Sandal comes with a thick rubber lug outsole that brings traction to stay sturdy in all the terrains. ', 84, 'timberlandsandals.png'),
(12, 'UGG Fluff Yeah Slides', 'sandals', 'Slide into cozy comfort and say Fluff Yeah! Made with a sheepskin lining and insole for both comfort and durability, these slides also feature an elastic strap with that familiar UGG graphic', 125, 'uggslides.png'),
(13, 'Ronald Double Monk Strap Shoe', 'formal', 'Burnished calfskin leather adds rich color to a handsome Italian monk shoe built with cushioned arch support for all-day comfort.', 300,'ronalformal.png'),
(14, 'Grandioso 2 Monochrome Bit Loafer', 'formal', 'Double Gancios are split into a stylish bit and plated to match the black leather of this sleek Italian-made loafer.', 500, 'ferragamo.png'),
(15, 'Dax Plain Toe Derby', 'formal', 'A rubber sole keeps you firmly planted in this plain-toe derby with a classically handsome silhouette.', 120, 'derby.png'),
(16,'Larin Pump', 'heels', 'This slingback pump with a strap that curves across the instep and continues to the heel elevates an everyday essential.', 100, 'larinpump.png'),
(17,'Audrea Platform Sandal', 'heels', 'A flared heel wont go unnoticed on this dramatic platform sandal secured with a knotted vamp and adjustable ankle strap.', 125, 'audrea.png'),
(18,'Pama Sandal', 'heels', 'Knotted straps enhance the contemporary character of a sandal lifted by a slightly flared block heel.', 70, 'pamadolcevita.png'),
(19, 'Lior Loafer', 'flats', 'Polished horsebit hardware styles a comfortable loafer in a classic silhouette upgraded in of-the-moment materials.', 185,'liorloafer.png'),
(20, 'Marley Driving Moccasin','flats', 'A stitched vamp and nubby sole maintain the classic aesthetic of the driving moccasin, while COACHs iconic hardware brings signature style to this loafer.', 175, 'coachflat.png'),
(21, 'Kyla Flat Mule', 'flats', 'A roped buckle accent with an antique finish lends a refined touch to a sleek mule finished with a pointed toe and low block heel.', 54, 'kylaflat.png'),
(22, 'Jadon Boot', 'boots', 'A thick Quad Retro sole boosts a smooth leather mid-calf boot with an 80s-rewind profile.', 280, 'drboot.png'),
(23, 'Briona Lug Sole Chelsea Boot', 'boots', 'A lug sole brings a bit of utilitarian edge to this sleek Chelsea boot.', 96, 'chelseaboot.png'),
(24,'Laguna Waterproof Lug Sole Chelsea Boot','boots', 'A heavily lugged sole lends a utilitarian update to a classic Chelsea boot with stretchy gore insets at each side.', 265, 'lagunaboot.png');



CREATE TABLE wishlist (
  id int(100) NOT NULL,
  user_id int(100) NOT NULL,
  pid int(100) NOT NULL,
  name varchar(100) NOT NULL,
  price int(100) NOT NULL,
  image varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE cart
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

ALTER TABLE message
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE orders
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE products
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;


ALTER TABLE users
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE wishlist
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;
