-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2021 lúc 08:33 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_movies`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'Hành Động'),
(2, 'Tình Cảm'),
(3, 'Hài Hước'),
(4, 'Khoa Học'),
(5, 'Kiếm Hiệp'),
(6, 'Hoạt Hình'),
(7, 'Gia Đình'),
(8, 'Tâm Lý'),
(9, 'Trinh Thám'),
(10, 'Viễn Tưởng'),
(11, 'Kinh Dị'),
(12, 'Võ Thuật'),
(13, 'Cổ Trang'),
(14, 'Phiêu Lưu'),
(15, 'Học Đường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `comment_sender_name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `film_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(56, 44, 0, 'Phim hay', 'Tạ Quốc Trần', '2021-06-06 19:47:15'),
(57, 43, 0, 'Phim hay', 'Tạ Quốc Trần', '2021-06-06 19:47:37'),
(58, 44, 0, 'Phim hay', 'Tạ Quốc Trần', '2021-06-06 19:48:19'),
(59, 35, 0, 'Anh dev đẹp trai bố đời', 'Tạ Quốc Trần', '2021-06-06 19:48:51'),
(60, 1, 0, 'Anh diễn viên đẹp trai vl', 'Tạ Quốc Trần', '2021-06-06 19:50:40'),
(61, 44, 0, 'Phim hay', 'Tạ Quốc Trần', '2021-06-06 19:59:26'),
(62, 44, 0, 'Hay', 'Khách', '2021-06-06 19:59:37'),
(63, 44, 0, 'Phim hay', 'Con Chó Con', '2021-06-06 20:00:29'),
(64, 2, 0, 'phim hay', 'Con Vịt Con', '2021-06-07 14:25:28'),
(65, 17, 0, 'Diễn viên nữ xinh v~', 'Khách', '2021-06-07 19:35:59'),
(66, 5, 0, 'Anh dev đẹp trai ', 'Khách', '2021-06-08 09:48:28'),
(67, 18, 0, '.', 'Khách', '2021-06-08 14:23:00'),
(68, 34, 0, 'Phim hay', 'Con Vịt Con', '2021-06-10 13:33:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_episodes`
--

CREATE TABLE `tbl_episodes` (
  `episode_id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `episode_name` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_episodes`
--

INSERT INTO `tbl_episodes` (`episode_id`, `film_id`, `episode_name`, `video`) VALUES
(6, 17, 'Tập 1', 'assets/video/y2mate.com - Tuổi Trẻ Của Tháng Năm Trailer Phim TV_1080p.mp4'),
(7, 18, 'Tập 1', NULL),
(8, 19, 'Tập 1', NULL),
(9, 20, 'Tập 1', NULL),
(10, 21, 'Tập 1', NULL),
(11, 22, 'Tập 1', NULL),
(12, 23, 'Tập 1', NULL),
(13, 24, 'Tập 1', NULL),
(14, 25, 'Tập 1', NULL),
(15, 26, 'Tập 1', NULL),
(16, 27, 'Tập 1', NULL),
(17, 31, 'Tập 1', NULL),
(18, 32, 'Tập 1', NULL),
(19, 33, 'Tập 1', NULL),
(20, 17, 'Tập 2', 'assets/video/y2mate.com - Marvel Studios Black Panther Chiến Binh Báo Đen  Official Trailer_1080p.mp4'),
(21, 17, 'Tập 3', 'assets/video/y2mate.com - SUPERGIRL Official Trailer 2016_720p.mp4'),
(23, 18, 'Tập 2', 'assets/video/y2mate.com - Marvel Studios Black Panther Chiến Binh Báo Đen  Official Trailer_1080p.mp4'),
(24, 18, 'Tập 3', 'assets/video/y2mate.com - SUPERGIRL Official Trailer 2016_720p.mp4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_films`
--

CREATE TABLE `tbl_films` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `typemovie` int(11) DEFAULT NULL,
  `nation_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `image_vertical` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `num_view` int(11) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `quality` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `image_horizontal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_films`
--

INSERT INTO `tbl_films` (`id`, `name`, `sub_name`, `status`, `typemovie`, `nation_id`, `year`, `image_vertical`, `description`, `duration`, `num_view`, `subtitle`, `quality`, `video`, `image_horizontal`) VALUES
(1, 'Bàn Tay Diệt Quỷ', 'Saja / The Divine Fury / Sứ Giả Của Chúa / Evil expeller', 'Hoàn thành', 3, 6, 2019, 'assets/images/image-vertical/ban-tay-diet-quy.jpg', 'Sau khi bản thân bỗng nhiên sở hữu “Bàn tay diệt quỷ”, võ sĩ MMA Yong Hoo (Park Seo Joon thủ vai) đã dấn thân vào hành trình trừ tà, trục quỷ đối đầu với Giám Mục Bóng Tối (Woo Do Hwan) – tên quỷ Satan đột lốt người. Từ đó sự thật về cái chết của cha Yong Hoo cũng dần được hé lộ cũng như nguyên nhân anh trở thành “người được chọn”.', 129, 195891, 'Viet-EngSub', 'FHD', NULL, 'assets/images/image-horizontal/bantaydietquy.jpg'),
(2, 'Chiến Binh Báo Đen', 'Black Panther', 'Hoàn thành', 1, 4, 2018, 'assets/images/image-vertical/black-panther.jpg', 'Black Panther 2018 sẽ lấy bội cảnh hậu Nội chiến Siêu anh hùng. Sau khi phụ thân qua đời, T’Chala gánh lên vai trọng trách bảo vệ quê nhà khỏi những kẻ thù độc địa đang dần bành trướng thế lực. Tạo hình hai ác nhân của phim cũng được “nhá hàng”, gồm có Erik Killmonger - kẻ phản bội từng bị trục xuất khỏi Wakanda và M’Baku/ Man-Ape - thủ lĩnh của bộ tộc đối địch.', 134, 552593, 'Vietsub', 'FHD', 'assets/video/y2mate.com - Marvel Studios Black Panther Chiến Binh Báo Đen  Official Trailer_1080p.mp4', 'assets/images/image-horizontal/black-banner.png'),
(3, 'Nữ Siêu Nhân', 'Super Girl', 'Hoàn thành', 1, 4, 2019, 'assets/images/image-vertical/supergirl.jpg', 'Supergirl kể về cô gái 24 tuổi Kara Zor - El, cô chị họ của Superman. Cô nàng đã trốn thoát khỏi Krypton sau vụ nổ và trú ngụ tại trái đất dưới lốt một cô gái bình thường tên Kara Devengers. Nhưng sau đó ở tuổi 24, Kara quyết định sử dụng khả năng siêu nhiên của mình để trở thành siêu anh hùng.', 130, 12000, 'Viet-EngSub', 'FHD', 'assets/video/y2mate.com - SUPERGIRL Official Trailer 2016_720p.mp4', 'assets/images/image-horizontal/supergirl-banner.jpg'),
(4, 'Wanda và Vision', 'WandaVision', 'Hoàn thành', 1, 4, 2020, 'assets/images/image-vertical/wanda.png', 'Bộ phim pha trộn giữa phong cách phim sitcom cổ điển với MCU. Wanda Maximoff và Vision - hai con người với năng lực siêu nhiên đang có cuộc sống vô cùng lí tưởng ở vùng ngoại ô, lại bắt đầu nảy sinh những nghi ngờ về đối phương…', 129, 10000, 'Viet-EngSub', 'FHD', 'assets/video/y2mate.com - WandaVision  Official Trailer  Disney_1080p.mp4', 'assets/images/image-horizontal/wanda-banner.jpg'),
(5, 'Đại úy Marvel', 'Captain Marvel', 'Hoàn thành', 1, 4, 2019, 'assets/images/image-vertical/captain-marvel.png', 'Lấy bối cảnh những năm 90s, Captain Marvel là một cuộc phiêu lưu hoàn toàn mới đến với một thời kỳ chưa từng xuất hiện trong vũ trụ điện ảnh Marvel. Bộ phim kể về con đường trở thành siêu anh hùng mạnh mẽ nhất vũ trụ của Carol Danvers. Bên cạnh đó, trận chiến ảnh hưởng đến toàn vũ trụ giữa tộc Kree và tộc Skrull đã lan đến Trái Đất, liệu Danvers và các đồng minh có thể ngăn chặn binh đoàn Skrull cũng như các thảm họa tương lai?', 120, 287606, 'Viet-EngSub', 'FHD', 'assets/video/y2mate.com - Marvel Studios Captain Marvel  Official Trailer_1080p.mp4', 'assets/images/image-horizontal/captainmarvel.jpg'),
(6, 'Hành Tinh Hỗn Loạn', 'Chaos Walking', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/chaos-king.jpg', 'Todd Hewwitt (Tom Holland) tình cờ phát hiện ra Viola (Daisy Ridley)- một cô gái sống sót sau khi phi thuyền của cô gặp nạn và rơi xuống hành tinh của cậu. Hành tinh này không hề có bóng dáng phụ nữ, còn đàn ông thì bị ảnh hưởng bởi \'Tiếng Ồn\' - một thế lực thể hiện toàn bộ suy nghĩ của họ ra bên ngoài. Vì là cô gái duy nhất trên hành tinh kì lạ này, tính mạng của Viola bị đe dọa. Todd quyết tâm bảo vệ Viola và cả hai bị cuốn vào cuộc phiêu lưu nguy hiểm. Từ đó, Todd dần khám phá ra năng lực đặc biệt của mình, và phát hiện ra những bí mật đen tối của hành tinh mà cậu đang sống.', 109, 11111, 'Viet-EngSub', 'FHD', 'assets/video/y2mate.com - Chaos Walking Trailer 1 2021  Movieclips Trailers_1080p.mp4', 'assets/images/image-horizontal/chaosking.jpg'),
(7, 'Cô Gái Trẻ Hứa Hẹn', 'Promising Young Woman', 'Hoàn thành', 3, 5, 2020, 'assets/images/image-vertical/co-gai-tre-hua-hen.jpg', 'Cassie Thomas sống với bố mẹ và làm việc tại một quán cà phê. Trước đây cô từng theo học trường y, nhưng đã bỏ học sau khi bạn của cô là Nina bị cưỡng hiếp và không ai tin cô. Người ta cho rằng Nina sau đó đã chết do tự sát. Mỗi cuối tuần, Cassie đều đến quán bar và giả vờ say xỉn. Mỗi khi một người đàn ông đưa cô ấy về nhà và cố gắng lợi dụng cô ấy, cô ấy sẽ đối mặt với họ, mục đích thâm sâu là gì?', 113, 11111, 'Viet-EngSub', 'FHD', 'assets/video/(Official Trailer) CÔ GÁI TRẺ HỨA HẸN _ KC_ 24.04.2020.mp4', 'assets/images/image-horizontal/cogaitrehuahen.jpg'),
(8, 'Doraemon: Đôi Bạn Thân 2', 'Stand by Me Doraemon 2', 'Hoàn thành', 3, 2, 2020, 'assets/images/image-vertical/doraemon.jpg', 'Phim Doraemon: Đôi Bạn Thân Phần 2 là câu chuyện kể về sự việc Doraemon, chú mèo máy đến từ thế kỷ 22. Vào ngày nay khi Doraemon và Nobita ở cùng nhau, Nobita tìm thấy một con gấu bông trong phòng. Đó là một món đồ kỉ niệm đã được may lại bởi bà nội cậu đã qua đời khi cậu lên mẫu giáo. Nobita, người nhớ đến bà của mình và không còn ngừng khóc, muốn gặp lại bà bằng cỗ máy thời gian. Doraemon phản đối, nhưng khởi hành đến quá khứ, nơi Nobita mới lên 3, với điều kiện cậu phải trở lại ngay khi nhìn thấy tình huống mà không gặp trực tiếp!\r\n', 96, 10000, 'Vietsub', 'FHD', 'assets/video/Doraemon - Stand By Me 2(Đôi Bạn Thân) _ Trailer Vietsub.mp4', 'assets/images/image-horizontal/doraemondoibanthan2.jpg'),
(9, 'Godzilla Đại Chiến Kong', 'Godzilla vs. Kong', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/godzilla.jpg', 'Khi hai kẻ thù truyền kiếp gặp nhau trong một trận chiến ngoạn mục, số phận của cả thế giới vẫn còn bị bỏ ngỏ… Bị đưa khỏi Đảo Đầu Lâu, Kong cùng Jia, một cô bé mồ côi có mối liên kết mạnh mẽ với mình và đội bảo vệ đặc biệt hướng về mái nhà mới. Bất ngờ, nhóm đụng độ phải Godzilla hùng mạnh, tạo ra một làn sóng hủy diệt trên toàn cầu. Thực chất, cuộc chiến giữa hai kẻ khổng lồ dưới sự thao túng của các thế lực vô hình mới chỉ là điểm khởi đầu để khám phá những bí ẩn nằm sâu trong tâm Trái đất.', 96, 9999, 'Viet-EngSub', 'FHD', 'assets/video/godzilla-vs-kong.mov', 'assets/images/image-horizontal/godzillavskong.jpg'),
(10, 'Kẻ Vô Danh', 'Nobody', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/ke-vo-danh.jpg', 'Đôi khi người đàn ông mà bạn không để ý lại là người nguy hiểm nhất. Hutch Mansell, một người cha và người chồng bị đánh giá thấp và bị coi thường, luôn coi thường sự phẫn nộ của cuộc đời và không bao giờ lùi bước. Một kẻ vô danh.', 92, 1111, 'Viet-EngSub', 'FHD', 'assets/video/nobody-trailer-1_h480p.mov', 'assets/images/image-horizontal/kevodanh.jpg'),
(11, 'Nhân Đôi Tình Yêu', ' Double Patty', 'Hoàn thành', 3, 6, 2021, 'assets/images/image-vertical/nhan-doi-tinh-yeu.jpg', 'Hyun Ji là cô sinh viên vừa ra trường mang tham vọng trở thành nữ phát thanh viên nổi tiếng, còn Woo Ram là vận động viên đấu vật trẻ mới hồi phục sau chấn thương thi đấu. Gặp nhau ngay đúng thời khắc lạc lõng và chênh vênh của thanh xuân, cả hai đã cùng giúp nhau.', 102, 2222, 'Vietsub', 'FHD', 'assets/video/(Official Trailer) DOUBLE PATTY - NHÂN ĐÔI TÌNH YÊU _ KC 21.04.2021.mp4', 'assets/images/image-horizontal/nhandoitinhyeu.jpg'),
(12, 'Mortal Kombat: Đấu Trường Sinh Tử', 'Mortal Kombat', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/mortal-kombat.jpg', 'Mortal Kombat: Cuộc Chiến Sinh Tử xoay quanh võ sĩ võ thuật tổng hợp Cole Young (Lewis Tan), người mang trên mình một vết chàm rồng đen bí ẩn - biểu tượng của Mortal Kombat. Cole Young không hề biết về dòng máu bí ẩn đang chảy trong người anh, hay vì sao anh lại bị tên sát thủ Sub-Zero (Joe Taslim) săn lùng. Vì sự an nguy của gia đình, Cole cùng với một nhóm những chiến binh đã được tuyển chọn để tham gia vào một trận chiến đẫm máu nhằm chống lại những kẻ thù đến từ Outworld.', 110, 3333, 'Viet-Engsub', 'FHD', 'assets/video/mortal-kombat.mov', 'assets/images/image-horizontal/mortalkombat.jpg'),
(13, 'Trùm Cuối Siêu Đẳng', 'Boss Level', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/trum-cuoi-sieu-dang.jpg', 'Mắc kẹt trong một vòng lặp thời gian ngay đúng ngày anh ta bị giết chết, một cựu đặc vụ Roy Pulver (Frank Gillo) đã phát hiện ra manh mới về một dự án bí mật của chính phủ có thể giải đáp bí ẩn đằng sau cái chết vô thời hạn của anh ta. Roy buộc lòng phải chạy đua với thời gian và truy bắt tên Colonel Ventor (Mel Gibson), đầu sỏ của dự án chính phủ này. Trong lúc đó, anh phải thoát khỏi cuộc vây bắt của những tên sát thủ tàn ác quyết tâm ngăn cản Roy tìm ra được sự thật. Liệu Roy Pulver có thể thoát khỏi vòng lặp này và cứu lấy gia đình đồng thời sống lại một lần nữa vào ngày mai?', 100, 4444, 'Viet-Engsub', 'FHD', 'assets/video/(Official Trailer) Boss Level - Trùm Cuối Siêu Đẳng _ Khởi chiếu từ 23.04.2021.mp4', 'assets/images/image-horizontal/trumcuoisieudang.jpg'),
(14, 'Tộc Săn Người', 'Wrong Turn / Ngã Rẽ Tử Thần ', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/toc-san-nguoi.jpg', 'Wrong Turn sẽ là bước ngoặt mới cho loạt phim dài hơi dường như đã đi vào ngõ cụt. Phim đưa một nhóm bạn không may mắn đến Harpers Ferry, Tây Virginia để dành vài ngày đi bộ đường dài trên đường mòn Appalachian. Trong phần này, họ phải đối mặt với “The Foundation”, một cộng đồng những người đã sống trên núi từ trước Nội chiến, và họ không tốt với người lạ.', 109, 5555, 'Viet-Engsub', 'FHD', 'assets/video/y2mate.com - WRONG TURN Official Trailer New 2021_1080p.mp4', 'assets/images/image-horizontal/tocsannguoi.jpg'),
(15, 'Tay Xạ Thủ', 'The Marksman', 'Hoàn thành', 3, 4, 2021, 'assets/images/image-vertical/tay-xa-thu.jpg', 'Jim - một cựu thủy quân lục chiến tại biên giới bang Arizona vô tình bị cuốn theo cuộc truy lùng của băng Vasquez khi cố giúp đưa Miguel thoát khỏi chúng. Nhiệm vụ giờ đây của Jim là \"vận chuyển\" Miguel về Chicago cùng gia đình trước sự truy giết máu lạnh của băng đảng Vasquez.', 108, 19378, 'Viet-Engsub', 'FHD', 'assets/video/y2mate.com - Main Trailer TAY XẠ THỦ  KC 22012021_1080p.mp4', 'assets/images/image-horizontal/tayxathu.jpg'),
(16, 'Thanh Gươm Diệt Quỷ: Chuyến Tàu Vô Tận', 'Kimetsu no Yaiba: Mugen Ressha-Hen / Demon Slayer Movie - Mugen Train', 'Hoàn thành', 1, 2, 2020, 'assets/images/image-vertical/thanh-guom-diet-quy.jpg', 'Trên đường điều tra sự mất tích của các Kiếm Sĩ thuộc Đội Diệt Quỷ, Tanjiro và các đồng đội cùng Viêm Trụ Rengoku rơi vào Huyết Quỷ Thuật ảo mộng của Quỷ Hạ Huyền Enmu. Cả bọn phải hiệp lực để bảo toàn tính mạng cho 200 hành khách trên chuyến tàu Vô Tận. Nhờ sự hi sinh của Viêm Trụ Rengoku, Quỷ Hạ Huyền đã bị đánh bại và mọi người được sống sót', 117, 7777, 'Vietsub', 'FHD', 'assets/video/kimetsunoyaiba.mp4', 'assets/images/image-horizontal/thanhguomdietquy.jpg'),
(17, 'Tuổi Trẻ Của Tháng Năm', 'Youth of May', '8/16 tập', 2, 6, 2021, 'assets/images/image-vertical/tuoi-tre-cua-thang-nam.jpg', 'Bộ phim kể về cuộc sống của hai nhân vật trẻ tuổi đã bị cuốn vào cuộc nổi dậy Gwangju xảy ra vào tháng 5, năm 1980. Hwang Hee Tae là một kẻ gây rối, người luôn ghét những gì được sắp đặt trước. Cuộc đời của anh đã được mô tả bằng cum từ : Cuộc chiến chống lại định kiến . Nhờ phá vỡ định kiến đối với những con được nuôi dưỡng bởi những người mẹ đơn thân, anh đã được tuyển tại đại học Seul. Tuy nhiên, do những sự kiện bất ngờ xảy ra, anh đã phải trải qua những năm tháng khắc nhiệt nhất trong cuộc đời. Kim Myung Hee là một nữ y tá, luôn làm việc chăm chỉ và hết lòng cho các bệnh nhân của mìn', NULL, 70734, 'Vietsub ', 'FHD', 'assets/video/y2mate.com - Tuổi Trẻ Của Tháng Năm Trailer Phim TV_1080p.mp4', 'assets/images/image-horizontal/tuoitrecuathangnam.jpg'),
(18, 'Bạch Ngọc Tư Vô Hà', 'Love like White Jade', '30/32 tập', 2, 3, 2021, 'assets/images/image-vertical/bachngoctuvoha.jpg', 'Bộ phim nói về câu chuyện tình yêu ngọt ngào của thị nữ kim bài của Lang Nha Các - Thủy Vô Hà phụ trách phò tá đại thiếu gia ăn chơi lêu lỏng Giang Bạch Ngọc học văn võ.\r\n\"Người thầy thiếu nữ mặt lạnh\" và \"học trò hai mặt\" trải qua hàng trăm chiêu trò cuối cùng trở thành một đôi~~~', NULL, 9510, 'Vietsub', 'FHD', 'assets/video/bachngoctuvoha.mp4', 'assets/images/image-horizontal/bachngoctuvoha.jpg'),
(19, 'Dưới Lớp Vỏ Bọc', 'Ugly Beauty', '5/24 tập', 2, 3, 2021, 'assets/images/image-vertical/duoilopvoboc.jpg', 'Sau khi mở màn, dưới ánh đèn đột nhiên nữ thần Diêu Mộng Quy thất thần ngay trước mặt mọi người. Từ đó, tính cách của Diêu Mộng Quy - người đang đứng trên đỉnh cao bỗng nhiên thay đổi thành một người khác!\r\nTrong lúc mọi người đang xôn xao, Trần Mặc phát hiện điểm khả nghi nên quyết định điều tra chân tướng. Nhưng trong quá trình tiếp cận Diêu Mộng Quy, Trần Mặc lại vô tình yêu cô ấy. Cho đến khi anh ta phát hiện ra người trước mắt không phải là Diêu Mộng Quy, mà là em gái sinh đôi có vẻ ngoài giống hệt như cô ấy - Tiêu Mộ.\r\nVạch mặt hay bảo vệ? Trần Mặc rối rắm vô cùng.\r\nTiếp tục trở thành cái bóng, hay sống lại cuộc sống của mình? Sự lựa chọn của Tiêu Mộ vô cùng cấp bách.\r\nBao giờ thì người đứng sau điều khiển cả bàn cờ này lộ mặt?\r\nAi là sói, và ai là phù thủy đây?', NULL, 688, 'Vietsub', 'HD', 'assets/video/duoilopvoboc.mp4', 'assets/images/image-horizontal/duoilopvoboc.jpg'),
(20, 'Tiểu Nữ Nghê Thường', 'Ni Chang', '37/40 tập', 2, 3, 2021, 'assets/images/image-vertical/tieununghethuong.jpg', 'Bộ phim Tiểu Nữ Nghê Thường - Ni Chang kể về con gái của cửa hiệu tơ tằm nổi tiếng Tạ Thị - Tạ Tiểu Nghê (do Lệ Gia Kỳ thủ vai). Cô được thừa kế cơ nghiệp của gia tộc và trở thành nữ thương nhân trong thời kỳ Đại Ninh. Gia đình và sự nghiệp của gia tộc cô bị hủy hoại dưới tay Tô Thị - một kẻ thù cùng trong giới tơ tằm. Tô Thị không từ thủ đoạn tìm cách tiêu diệt cô.', NULL, 59802, 'Vietsub', 'FHD', 'assets/video/tieununghethuong.mp4', 'assets/images/image-horizontal/tieununghethuong.jpg'),
(21, 'Ngộ Long', 'Miss The Dragon', '10/36 tập', 2, 3, 2021, 'assets/images/image-vertical/ngolong.jpg', 'Ngộ Long kể về một cô nha hoàn tên Lưu Huỳnh (Chúc Tự Đan) trong một lần tình cờ đã giúp tiểu thư cứu một con rắn. Không ngờ rằng con rắn đó lại là một con rồng tu luyện ngàn năm tên Uất Trì Long Viêm (Vương Hạc Đệ), vì muốn báo đáp ân tình nên đưa cô nha hoàn đi cùng và muốn thành thân với cô. Từ đó dẫn đến câu chuyện tình định mệnh trải qua nhiều kiếp. ', NULL, 9521, 'Vietsub', 'FHD', 'assets/video/ngolong.mp4', 'assets/images/image-horizontal/ngolong.jpg'),
(22, 'Chàng Trai Hoàn Hảo', 'Love Crossed', '8/24 tập', 2, 3, 2021, 'assets/images/image-vertical/changtraihoanhao.jpg', 'Bộ phim kể về cuộc gặp gỡ và trải nghiệm tình yêu của hai nữ chính và bốn thần tượng \"ảo\", kêu gọi mọi người quay về thực tại, quý trọng cuộc sống, cuối cùng sẽ gặt hái được tình yêu đẹp.', NULL, 1321, 'Vietsub', 'FHD', 'assets/video/changtraihoanhao.mp4', 'assets/images/image-horizontal/changtraihoanhao.jpg'),
(23, 'Đấu La Đại Lục', 'Soul Land / Douluo Dalu', '10/25 tập', 2, 3, 2018, 'assets/images/image-vertical/dauladailuc.jpg', 'Phim Đấu La Đại Lục - Soul Land 2018: Câu chuyện với nhân vật chính, con một thợ rèn, một thợ rèn trở thành tửu quỷ, vì thê tử đã mất. Đấu La Thế Giới, một đại lục rộng lớn, cư dân đông đúc. Chức nghiệp cao quý nhật tại đây được gọi là Hồn Sư. Mỗi người sinh ra, đều có một vũ hồn bẩm sinh. Vũ hồn có thể là cái cày, cái cuốc, liêm đao... thuộc khối công cụ, một đóa hoa cúc, một cành mai... thuộc thực vật hệ đến các vũ hồn cường đại như Tuyết Ảnh Ma Hùng, Tật Phong Ma Lang.... Để có thể trở thành hồn sư, ngoài vũ hồn cường đại, còn cần đến hồn lực để sử dụng vũ hồn đó, vũ hồn càng lớn, hồn lực càng cao, đại biểu cho thực lực mạnh mẽ tại Đấu la đại lục. Cứ 10 cấp hồn lực, vũ hồn có thể phụ gia thêm một cái hồn hoàn, có được từ việc liệp sát hồn thú, những quái thú mạnh mẽ, có tu vị hằng nghìn năm. Hành trình tu luyện, tìm hiểu bí ẩn cái chết của mẫu thân, bí mật tông sư của phụ thân.', NULL, 94559, 'Vietsub', 'HD', 'assets/video/dauladailuc.mp4', 'assets/images/image-horizontal/dauladailuc.jpg'),
(24, 'Cuộc Phiêu Lưu Của Những Con Thú Digimon', 'Digimon Adventure', '47/48 tập', 2, 2, 2020, 'assets/images/image-vertical/cuocphieuluucuanhungconthu.jpg', 'Năm 2020, mạng lưới ngày càng quan trọng trong cuộc sống con người. Nhưng loài người không biết phía khác của mạng lưới lại có một thế giới vô hạn – Thế giới Kỹ thuật số, và cả những Digimon đang sống bên trong… Nhân vật chính của câu chuyện là một học sinh lớp Năm Yagami Taichi sống ở ngoại ô Tokyo, mẹ và em gái cậu ngồi vào chiếc tàu điện không dừng lại được. Để cứu họ, Taichi vô ý đã vào Thế giới Kỹ thuật số! Những đứa trẻ gặp gỡ các Digimon cộng sự, cùng đối mặt với “cuộc phiêu lưu” không biết trước!', NULL, 35626, 'Vietsub', 'FHD', 'assets/video/cuocphieuluucuacacconthu.mp4', 'assets/images/image-horizontal/cuocphieuluucuanhungconthu.jpg'),
(25, 'Anh Sẽ Làm Giang Hồ Vì Em', 'Tokyo Revengers', '5/??? tập', 2, 2, 2021, 'assets/images/image-vertical/anhselamgianghoviem.jpg', 'Takemichi, thanh niên thất nghiệp còn trinh, được biết rằng người con gái đầu tiên và cũng là duy nhất cho đến bây giờ mà anh hẹn hò từ trung học đã chết. Sau một vụ tai nạn, anh ta thấy mình được quay về những ngày cấp hai. Anh ta thề sẽ thay đổi tương lai và giữ lấy người con gái ấy, để làm việc đó, anh ta quyết định sẽ vươn lên làm trùm băng đảng khét tiếng nhất ở vùng Kantou.', NULL, 11104, 'Vietsub', 'FHD', 'assets/video/tokyorevenger.mp4', 'assets/images/image-horizontal/anhselamgianghoviem.jpg'),
(26, 'Chiến Binh Được Phái Đi', 'Sentouin, Hakenshimasu! / Combatants Will Be Dispatched!', '6/12 tập', 2, 2, 2021, 'assets/images/image-vertical/chienbinhduocphaidi.jpg', 'Từ tác giả của KONOSUBA, một bộ light novel mới đã xuất hiện! Thật khó khăn khi phải đứng trên chiến tuyến cho một tổ chức xấu xa và không ai biết điều này tốt hơn No. 6, một Chiến binh cho Mật Đội Kisaragi. Được phái đến một thế giới xa lạ ngoài hành tinh trên một nhiệm vụ trinh sát, cậu ta có một người bạn đồng hành là android mới, nhưng cậu phải lên kế hoạch cho một cuộc xâm lược giữa các vì sao - của một thế giới tưởng tượng như thế nào?!', NULL, 3638, 'Vietsub', 'FHD', 'assets/video/chienbinhduocphaidi.mp4', 'assets/images/image-horizontal/chienbinhduocphaidi.jpg'),
(27, 'Thiên Bảo Phục Yêu Lục', 'Tian Bao Fuyao Lu / Legend of Exorcism', '17/26 tập', 2, 3, 2020, 'assets/images/image-vertical/thienbaophucyeuluc.jpg', 'Năm Thiên Bảo thứ 12, thiếu niên Hồng Tuấn không rành thế sự, được giao cho ba trọng trách rời khỏi Diệu Kim cung núi Thái Hành, đến với chốn phồn hoa cẩm tú Trường An. Khổng Hồng Tuấn gia nhập Khu Ma Ti, người lãnh đạo lại là tướng lĩnh Long Vũ quân Lý Cảnh Lung, kẻ cách đó không lâu đã giao thủ với cậu.\r\nTrong lúc đánh nhau Lý Cảnh Lung đã đánh nát bảo vật Tâm đăng của Hồng Tuấn, Tâm đăng nhập vào người của Lý Cảnh Lung. Trong ánh đèn kia, có Bình Khang xa hoa trụy lạc, có cây ngô đồng Khu Ma Ti giữa trời hè chói chang, có phương bắc bão tuyết rét căm căm, có tiếng ca trong trẻo của A Thái, có Mạc Nhật Căn và Lục Hứa với tay ngắt một chiếc lá cây, có nét bút tung bay của Cừu Vĩnh Tư.', NULL, 3224, 'Vietsub', 'FHD', 'assets/video/thienbaophucyeuluc.mp4', 'assets/images/image-horizontal/thienbaophucyeuluc.jpg'),
(28, 'SamSam: Anh Hùng Nhí Tập Sự', 'SamSam', 'Hoàn thành', 1, 4, 2019, 'assets/images/image-vertical/anhhungnhitapsu.jpg', 'Nhóc tì siêu quậy Samsam có tất cả mọi thứ mà bao đứa trẻ trên hành tinh Sam đều mơ ước: bố mẹ là hai siêu anh hùng nổi tiếng, học tập ở một ngôi trường danh giá chuyên đào tạo các thế hệ siêu nhân tương lai, thậm chí Samsam còn có hẳn một đĩa bay riêng để vi vu khắp nơi khắp chốn. Thế nhưng, cậu bé lại không có chút siêu năng lực nào, hoàn toàn khác biệt với tất cả các thành viên trong gia đình cũng như bạn bè đồng trang lứa. Bố mẹ lo lắng, bè bạn trêu ghẹo, Samsam bắt đầu hành trình tới hành tinh Marth bí ẩn cùng người bạn mới Mega, quyết tâm tìm kiếm sức mạnh ẩn tiềm của bản thân mình.', NULL, 3342, 'Lồng tiếng', 'FHD', NULL, 'assets/images/image-horizontal/anhhungnhitapsu.jpg'),
(29, 'Hành Trình Của XiCo', ' El Camino de Xico / Xico\'s Journey', 'Hoàn thành', 1, 5, 2020, 'assets/images/image-vertical/hanhtrinhcuaxico.jpg', 'Cô bé nọ cùng cậu bạn thân và một chú chó quyết cứu một ngọn núi khỏi công ty muốn khai thác vàng. Nhưng chìa khóa lại chẳng ở đâu xa, khi đã có chú chó thân thiết Xico.', NULL, 3855, 'Viet-Engsub', 'FHD', NULL, 'assets/images/image-horizontal/hanhtrinhcuaxico.jpg'),
(30, 'Thám Tử Lừng Danh Conan: Viên Đạn Đỏ', ' Meitantei Conan: Hiiro no fuzai shômei / Detective Conan Movie 24: The Scarlet Bullet', 'Update', 1, 2, 2021, 'assets/images/image-vertical/thamtulungdanhconan.jpg', 'Thế vận hội thể thao lớn nhất thế giới được tổ chức tại Tokyo, Nhật Bản thu hút rất nhiều sự chú ý. Khi sự kiện ra mắt con tàu siêu tốc với tốc độ 1000km/h diễn ra cũng là lúc hàng loạt các vụ bắt cóc xảy ra! Gia tộc hiểm ác tụ tập tại đây sẽ gây ra một loạt sự kiện chấn động thế giới!', NULL, 10970, 'Vietsub', 'FHD', NULL, 'assets/images/image-horizontal/thamtulungdanhconan.jpg'),
(31, 'Danh Sách Đen', 'The Blacklist ', '10/15 tập', 2, 4, 2020, 'assets/images/image-vertical/danhsachden.jpg', 'A highly articulate, erudite and intelligent businessman and mastermind, \"Red\" Reddington, has allegedly been on the \"10 Most Wanted List\" of various U.S. law enforcement agencies for over 20 years. The legend is that Red is as elusive as he is clever, controlling a labyrinth of creative enterprises, coupled with uncanny ability to gather and finesse information at the drop of a hat. On the first day at FBI for a new female profiler fresh out of Quantico, Red offers to bandy wits with the FBI. Red promises to deliver various criminals and plots previously unknown to any branch of law enforcement... and all Red requests in return is to choose his muse.', NULL, 10860, 'Vietsub', 'FHD', NULL, 'assets/images/image-horizontal/danhsachden.jpg'),
(32, 'Xin Cậu Đấy, Lớp Trưởng', 'Please Classmate', '24/24 tập', 2, 3, 2021, 'assets/images/image-vertical/xincaudayloptruong.jpg', 'Chuyện phim Xin Cậu Đấy Lớp Trưởng xoay quanh 2 thanh niên có hiềm khích với nhau. Trớ trêu thay, cuộc đời lại kéo họ về cùng một lớp học. Nhưng vì một sự cố diễn ra nên hai chàng trai buộc phải bắt tay nhau và tạm quên đi hiềm khích trước kia để trở thành bạn bè. Ninh Trạch Vũ là một nam sinh đơn giản nhưng lại là thần học, thành tích học tập luôn đứng đầu đồng thời là tấm gương sáng cho các bạn cùng lớp noi theo. Lý Hách là một nam sinh kiêu ngạo, giỏi thể thao, mặc dù được nhiều nữ sinh trong trường yêu mến nhưng cậu luôn phớt lờ đi. Diệp Cảnh Hi có ngoại hình, có thần thái lẫn phong cách ăn mặc, cậu mơ ước trở thành người mẫu trong tương lai.\r\nXin Cậu Đấy Lớp Trưởng là câu nói của cả 3 người trên, mỗi người một lợi thế riêng nhưng lại thích nữ sinh Viên Thái Hi - nữ sinh học cùng lớp và cũng là lớp trưởng. Vì cô gái này mà xảy ra mâu thuẫn. Tuy nhiên, cô ấy vì để mắt đến nam sinh mới chuyển tới mà từ chối cả 3 người. Lúc này, cả 3 lại phải hợp sức với nhau để giành lại Thái Hi.', NULL, 32445, 'Vietsub', 'FHD', NULL, 'assets/images/image-horizontal/xincaudayloptruong.jpg'),
(33, 'Tình Đầu Trở Lại', 'First Love Again', '24/24', 2, 3, 2021, 'assets/images/image-vertical/tinhdautrolai.jpg', 'Ở không gian song song, học bá lạnh lùng Diệp Hựu Ninh (Thi Bách Vũ đóng) và \"cô gái hướng dương\" Hạ Văn Hy (Trần Hạo Vũ đóng) đã có một cuộc gặp gỡ kỳ lạ ngọt ngào. Hai người gặp nhau dưới xác suất là 1/1 tỷ, bắt đầu lại cuộc sống trung học, gặp lại bạn bè thời thanh xuân, bắt đầu lại mối tình đầu ngây ngô. Cuộc đối thoại xuyên qua thời không này phủ lên một tầng sắc màu kỳ diệu lên khoảng thời gian thiếu niên tươi đẹp.', NULL, 716, 'Vietsub', 'FHD', NULL, 'assets/images/image-horizontal/tinhdautrolai.jpg'),
(34, 'Trái Tim Quái Vật', 'Monster Heart', 'Hoàn thành', 1, 1, 2020, 'assets/images/image-vertical/traitimquaivat.jpg', 'Một người hàng xóm lo lắng giúp bà mẹ đơn thân cùng con trai đi trốn khi cô bị coi là nghi phạm chính của vụ án mạng trong khu chung cư.', NULL, 122132, 'Vietsub', 'FHD', NULL, 'assets/images/image-horizontal/traitimquaivat.jpg'),
(35, 'Ấn Quỷ', 'The Unholy', NULL, 1, 4, 2021, 'assets/images/image-vertical/AnQuy.jpg', 'The Unholy (Tựa Việt: Ấn Quỷ) xoay quanh cô gái khiếm thính Alice (Cricket Brown) tại một thị trấn nhỏ thuộc vùng New England. Một ngày nọ, cô bỗng nhiên có thể nghe, nói như bình thường và có được năng lực chữa bệnh cho mọi người. Hàng trăm nghìn người từ khắp đất nước đổ về chứng kiến phép màu của cô. Trong số này, nhà báo Gerry Fenn (Jeffrey Dean Morgan) muốn thực hiện một phóng sự để cứu vãn sự nghiệp. Song, hàng loạt những sự kiện kinh hoàng xảy ra khiến ông dần nhận ra thế lực ma quỷ thật sự đứng sau lưng cô gái trẻ.', 99, NULL, 'Viet-Engsub', 'FHD', NULL, 'assets/images/image-horizontal/An-Quy.jpg'),
(43, 'Thanh Âm Trong Mắt Em', 'Kimi no me ga toikaketeiru / Your Eyes Tell', NULL, 1, 2, 2020, 'assets/images/image-vertical/thanhamtrongmatem.jpg', 'Sau vụ tai nạn thương tâm, Akari mất đi cả gia đình lẫn đôi mắt. Thế nhưng, cô gái vẫn rất mạnh mẽ, tìm kiếm niềm vui từ những điều bình dị để sống tiếp. Tình cờ, cô quen biết Rui. Nụ cười trong sáng của Akari đã khiến chàng từng là võ sĩ quyền anh có quá khứ đen tối thay đổi. Thế nhưng, lúc họ nhận ra tình cảm dành cho nhau thì Rui cũng biết được tai nạn ngày xưa của Akari có liên quan đến anh... ', 123, NULL, 'Viet-Engsub', 'FHD', NULL, 'assets/images/image-horizontal/thanh-am-trong-mat-em.jpg'),
(44, 'Hung Thần Trắng', 'Great White', NULL, 1, 4, 2021, 'assets/images/image-vertical/hungthantrang.jpg', 'Bộ phim kể về vụ truy sát kinh hoàng bởi loài cá mập trắng khổng lồ diễn ra tại Hell’s Reef, cách xa bờ 200 dặm đã khiến nhiều người thiệt mạng. Trước khi án mạng xảy ra, chuyến đi có Kaz và Charlie – đôi tình nhân lâu năm, đồng thời là những người điều hành thủy phi cơ. Ba vị khách của họ là doanh nhân người Nhật, Joji cùng vợ – Michelle và đầu bếp Benny. Tuy nhiên, vào lúc phát hiện ra thi thể của một người đàn ông chỉ còn lại phần thân đã trầy xước cùng những vết cắn được Charlie (một cựu sinh viên ngành sinh vật biển) xác nhận là do cá mập gây ra, kỳ nghỉ trong mơ bỗng biến thành thảm kịch khi cả 5 người phải giành giật sự sống chỉ với một chiếc phao cứu hộ giữa biển cả mênh mông và kẻ săn mồi trực diện chính là hung thần khát máu thống trị đại dương.', 91, NULL, 'Viet-Engsub', 'FHD', NULL, 'assets/images/image-horizontal/hung-than-trang.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_listcategory`
--

CREATE TABLE `tbl_listcategory` (
  `film_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_listcategory`
--

INSERT INTO `tbl_listcategory` (`film_id`, `category_id`, `list_id`) VALUES
(2, 10, 1),
(3, 4, 2),
(4, 2, 3),
(4, 10, 4),
(4, 4, 5),
(5, 1, 6),
(5, 14, 7),
(5, 10, 8),
(6, 14, 9),
(6, 4, 10),
(7, 11, 11),
(7, 8, 12),
(8, 3, 13),
(8, 6, 14),
(8, 10, 15),
(8, 4, 16),
(9, 1, 17),
(9, 14, 18),
(9, 11, 19),
(9, 10, 20),
(9, 4, 21),
(10, 1, 22),
(10, 11, 23),
(11, 2, 24),
(11, 8, 25),
(12, 1, 26),
(12, 14, 27),
(12, 11, 28),
(12, 10, 29),
(12, 4, 30),
(13, 1, 31),
(13, 4, 32),
(13, 11, 33),
(14, 11, 34),
(15, 1, 35),
(15, 11, 36),
(16, 1, 37),
(16, 6, 38),
(16, 10, 39),
(16, 14, 40),
(17, 2, 41),
(17, 8, 42),
(18, 2, 43),
(18, 8, 44),
(19, 2, 45),
(19, 8, 46),
(19, 13, 47),
(20, 2, 48),
(20, 8, 49),
(20, 13, 50),
(21, 1, 51),
(21, 12, 52),
(21, 13, 53),
(22, 2, 54),
(22, 8, 55),
(23, 1, 56),
(23, 6, 57),
(23, 12, 58),
(23, 13, 59),
(24, 3, 60),
(24, 6, 61),
(24, 14, 62),
(25, 1, 63),
(25, 2, 64),
(25, 3, 65),
(25, 6, 66),
(26, 1, 67),
(26, 3, 68),
(26, 6, 69),
(26, 10, 70),
(27, 1, 71),
(27, 6, 72),
(27, 14, 73),
(27, 5, 74),
(27, 12, 75),
(28, 6, 76),
(28, 7, 77),
(29, 6, 78),
(29, 7, 79),
(30, 6, 80),
(30, 9, 81),
(30, 14, 82),
(31, 9, 83),
(31, 11, 84),
(32, 2, 85),
(32, 15, 86),
(33, 2, 87),
(33, 15, 88),
(34, 7, 89),
(34, 8, 90),
(35, 11, 135),
(1, 1, 259),
(1, 11, 260),
(36, 2, 261),
(43, 2, 263),
(44, 1, 264),
(44, 11, 265);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nations`
--

CREATE TABLE `tbl_nations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_nations`
--

INSERT INTO `tbl_nations` (`id`, `name`) VALUES
(1, 'Việt Nam'),
(2, 'Nhật Bản'),
(3, 'Trung Quốc'),
(4, 'Mỹ'),
(5, 'Anh'),
(6, 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_navmenu`
--

CREATE TABLE `tbl_navmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `handle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_navmenu`
--

INSERT INTO `tbl_navmenu` (`id`, `name`, `handle`) VALUES
(1, 'Thể loại', 'category'),
(2, 'Quốc gia', 'nation'),
(3, 'Phim lẻ', 'single-movie'),
(4, 'Phim bộ', 'seri-movie'),
(5, 'Chiếu rạp', 'theater-movie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating_action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `film_id`, `user_id`, `rating_action`) VALUES
(20, 1, 99, 'like');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_serimovies`
--

CREATE TABLE `tbl_serimovies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_serimovies`
--

INSERT INTO `tbl_serimovies` (`id`, `name`, `year`) VALUES
(1, 'Phim bộ 2020', '2020'),
(2, 'Phim bộ 2019', '2019'),
(3, 'Phim bộ 2018', '2018'),
(4, 'Phim bộ 2017', '2017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_singlemovies`
--

CREATE TABLE `tbl_singlemovies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_singlemovies`
--

INSERT INTO `tbl_singlemovies` (`id`, `name`, `year`) VALUES
(1, 'Phim lẻ 2020', '2020'),
(2, 'Phim lẻ 2019', '2019'),
(3, 'Phim lẻ 2018', '2018'),
(4, 'Phim lẻ 2017', '2017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theatermovies`
--

CREATE TABLE `tbl_theatermovies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_theatermovies`
--

INSERT INTO `tbl_theatermovies` (`id`, `name`, `year`) VALUES
(1, 'Phim chiếu rạp 2020', '2020'),
(2, 'Phim chiếu rạp 2019', '2019'),
(3, 'Phim chiếu rạp 2018', '2018'),
(4, 'Phim chiếu rạp 2017', '2017');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_typemovies`
--

CREATE TABLE `tbl_typemovies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `handle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_typemovies`
--

INSERT INTO `tbl_typemovies` (`id`, `name`, `handle`) VALUES
(1, 'Phim lẻ', 'single-movies'),
(2, 'Phim bộ', 'seri-movies'),
(3, 'Phim chiếu rạp', 'theater-movies');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usertype_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `fullname`, `email`, `usertype_id`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@admin.com', 1),
(10, 'user1', 'c4ca4238a0b923820dcc509a6f75849b', 'Tạ Quốc Trần', 'dev.taquoctran@gmail.com', 2),
(11, '001', 'c4ca4238a0b923820dcc509a6f75849b', 'Gà con', 'test1@gmail.com', 2),
(14, 'conchocon', 'e10adc3949ba59abbe56e057f20f883e', 'Con Chó Con', 'conchocon@gmail.com', 2),
(15, 'usertest01', 'fcea920f7412b5da7be0cf42b8c93759', 'User test 01', 'usertest@gmail.com', 2),
(16, 'user2', 'e10adc3949ba59abbe56e057f20f883e', 'User 2', 'user2@gmail.com', 2),
(18, 'taquoctran', 'c4ca4238a0b923820dcc509a6f75849b', 'Con Vịt Con', 'test@gmail.com', 2),
(19, 'a', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a@gmail.com', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_usertypes`
--

CREATE TABLE `tbl_usertypes` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_usertypes`
--

INSERT INTO `tbl_usertypes` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_episodes`
--
ALTER TABLE `tbl_episodes`
  ADD PRIMARY KEY (`episode_id`) USING BTREE,
  ADD KEY `fk_tbl_episodes_tbl_films` (`film_id`);

--
-- Chỉ mục cho bảng `tbl_films`
--
ALTER TABLE `tbl_films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_films_tbl_typemovies` (`typemovie`),
  ADD KEY `fk_tbl_films_tbl_nations` (`nation_id`);

--
-- Chỉ mục cho bảng `tbl_listcategory`
--
ALTER TABLE `tbl_listcategory`
  ADD PRIMARY KEY (`list_id`);

--
-- Chỉ mục cho bảng `tbl_nations`
--
ALTER TABLE `tbl_nations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_navmenu`
--
ALTER TABLE `tbl_navmenu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_serimovies`
--
ALTER TABLE `tbl_serimovies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_singlemovies`
--
ALTER TABLE `tbl_singlemovies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_theatermovies`
--
ALTER TABLE `tbl_theatermovies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_typemovies`
--
ALTER TABLE `tbl_typemovies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_users_tbl_usertypes` (`usertype_id`);

--
-- Chỉ mục cho bảng `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `tbl_episodes`
--
ALTER TABLE `tbl_episodes`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_films`
--
ALTER TABLE `tbl_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_listcategory`
--
ALTER TABLE `tbl_listcategory`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT cho bảng `tbl_nations`
--
ALTER TABLE `tbl_nations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_navmenu`
--
ALTER TABLE `tbl_navmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_serimovies`
--
ALTER TABLE `tbl_serimovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_singlemovies`
--
ALTER TABLE `tbl_singlemovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_theatermovies`
--
ALTER TABLE `tbl_theatermovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_typemovies`
--
ALTER TABLE `tbl_typemovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_episodes`
--
ALTER TABLE `tbl_episodes`
  ADD CONSTRAINT `fk_tbl_episodes_tbl_films` FOREIGN KEY (`film_id`) REFERENCES `tbl_films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_films`
--
ALTER TABLE `tbl_films`
  ADD CONSTRAINT `fk_tbl_films_tbl_nations` FOREIGN KEY (`nation_id`) REFERENCES `tbl_nations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `fk_tbl_users_tbl_usertypes` FOREIGN KEY (`usertype_id`) REFERENCES `tbl_usertypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
