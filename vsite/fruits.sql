-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2024 lúc 05:55 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `skartjos_quanlibanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'fruit'),
(2, 'vegetable'),
(3, 'fresh'),
(4, 'dry food');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `product`, `orders`, `quantity`) VALUES
(1, 2, 1, 1),
(2, 2, 3, 1),
(3, 3, 4, 1),
(4, 4, 6, 1),
(5, 2, 8, 1),
(6, 16, 9, 1),
(7, 2, 13, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `total` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `address`, `total`, `note`) VALUES
(1, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 154, 'hehe'),
(2, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, 'hehe'),
(3, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 154, ''),
(4, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 139, ''),
(5, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, ''),
(6, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 45, ''),
(7, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, ''),
(8, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 154, ''),
(9, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 56, ''),
(10, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, ''),
(11, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, ''),
(12, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 0, ''),
(13, 'vuxx', '123@gmail.com', '111111', 'asdasdfasdf', 308, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  `category` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `content` text NOT NULL,
  `feature` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `category`, `updated_at`, `created_at`, `price`, `content`, `feature`) VALUES
(2, 'Táo Diva Hữu Cơ', 'thiet-ke-khong-ten-1_81ae5c49b0b34d408d367abb19295f6c_grande.webp', 1, '2024-12-18 13:40:39', '2024-11-28 08:03:13', 154, 'Được đặt tên theo từ tiếng Ý có nghĩa là ‘nữ thần’ hoặc ‘quý cô tốt đẹp’, Diva là một loại táo hảo hạng, có hương vị đặc biệt có nguồn gốc từ những vườn cây ăn trái xanh sạch, ngập tràn ánh nắng của Vịnh Hawkes, New Zealand.', 0),
(3, 'Táo Xanh Grany Smith Hữu Cơ', 'add_a_heading__1__66a31254bea34d099e0f7eb57642d285_grande.webp', 1, '2024-12-18 13:41:48', '2024-11-28 08:03:13', 139, 'Thông tin sản phẩm đang được cập nhật', 0),
(4, 'Chuối Laba Loại 1 Org', 'add_a_heading_9b34415e7c19413392dc5d48fe06992c_grande.jpg', 1, '2024-12-18 13:42:22', '2024-11-28 08:10:41', 45, 'Chuối Laba là một loại chuối đặc sản nổi tiếng của Việt Nam, chủ yếu được trồng tại vùng Lâm Đồng. Chuối Laba không chỉ được biết đến với hương vị thơm ngon, mà còn có giá trị dinh dưỡng cao, được nhiều người ưa chuộng.', 0),
(5, 'Táo juliet pháp organic size 100', 'tao_juliet_phap_organic_size_100_a2b3afdc3407490c8ace4732af77d3ff_grande.png', 1, '2024-12-18 13:42:56', '2024-11-28 08:10:41', 74, 'TÁO JULIET ORGANIC PHÁP -NGON LÀNH TỪ THIÊN NHIÊN', 0),
(6, 'Cam Trứng Hữu Cơ', '1101440_6c2c48134ee04aa5b3f2d4080d0928e5.webp', 1, '2024-12-18 13:43:20', '2024-11-28 08:10:41', 105, 'Đây là giống cam được khách hàng mong đợi nhất năm, nhà O luôn nhận được các feedback khen ngợi từ khách hàng cho dòng cam ăn cả vỏ này đó ạ. Số lượng về ít nên anh chị nhanh tay đặt hàng để kịp thưởng thức nha!', 1),
(7, 'Sầu Riêng Chuồng Bò', 'a82a13cc5c4cfd12a45d2_1bf60e63151143769588520e3ff7f909_grande.jpg', 1, '2024-12-18 13:43:48', '2024-11-28 08:10:41', 260, 'SẦU RIÊNG CHUỒNG BÒ - SẦU RIÊNG GIỐNG CỔ\r\nQuy cách: trái ~1.25-1.5kg.\r\nVùng canh tác: Việt Nam\r\nHướng dẫn bảo quản: bảo quản tủ mát khi sầu chín.', 0),
(8, 'Thanh long trắng hữu cơ Organicfood', 'thanh_long_trang_huu_co_kim_hai_-_1kg_b2e35115c35e49e49a18a0789dcb224d_grande.jpg', 1, '2024-12-18 13:44:16', '2024-11-28 08:10:41', 40, 'Thanh Long chuẩn Hữu Cơ tại Việt Nam - Tiêu Chuẩn USDA được trồng tại Bình Thuận. Đây là chứng nhận USDA mới nhất tại Việt Nam hiện tại. Với màu sắc bắt mắt, hương vị ngọt ngào, thanh long đỏ từ vỏ đến ruột, tươi ngon mát lành.', 1),
(9, 'LONG NHÃN ÔM HẠT SEN ORGANICFOOD 300G', 'unnamed_abc5b2e3db574a72b1cdfa18c47563dd_grande.webp', 1, '2024-12-18 13:44:39', '2024-11-28 08:10:41', 189, 'Sản phẩm Long nhãn ôm sen được sản xuất từ quả\r\n\r\n🍀 THÀNH PHẨN: 100% long nhãn và hạt sen bắc.\r\n\r\n🍀 CÔNG DỤNG: Long nhãn và hạt sen bắc là loại thực phẩm rất tốt cho sức khoẻ, hỗ trợ bồi bổ khí huyết, tăng cường hệ miễn dịch, giảm chứng mất ngủ thường xuyên, ...\r\n\r\n🍀 HƯỚNG DẪN SỬ DỤNG: Ăn trực tiếp\r\n\r\n🍀 BẢO QUẢN: Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp.', 0),
(10, 'Bơ Cuba', 'bo-cuba_504e2fc00ee445d5ba986da1ccc67b0c.webp', 1, '2024-12-18 13:45:03', '2024-11-28 08:10:41', 169, 'Bơ Cuba, còn được gọi là bơ Caribbean, là một loại trái cây nhiệt đới độc đáo có nguồn gốc từ vùng Caribbean, đặc biệt phổ biến ở Cuba. Loại bơ này không chỉ được biết đến với hương vị thơm ngon mà còn với những lợi ích dinh dưỡng phong phú. Hãy cùng tìm hiểu chi tiết về sản phẩm này.', 0),
(11, 'Bông Atiso Tươi Hữu Cơ loại 1', 'dia-chi-mua-bong-atiso_3af178ba4a734d178a33a2e7ef454a4b_grande.webp', 2, '2024-12-18 13:46:46', '2024-11-28 08:18:42', 390, 'Atiso có nhiều công dụng y học và gần như không có tác dụng phụ. Nó thường được dùng để kích thích sự tiết dịch của gan. Người ta cho rằng tác dụng này sẽ giúp giảm triệu chứng ợ nóng và xây xẩm sau khi say xỉn.\r\nKhông chỉ được dùng cho các bệnh về gan, tác dụng của atiso còn mở rộng sang phòng chống xơ vữa động mạch và chống tăng mỡ trong máu hoặc trị chứng khó tiêu.', 0),
(12, 'Cà chua beef hữu cơ - 300g', 'ca-chua-beef-huu-co_c78e7c53d66b46b288318569f3866694_grande.webp', 2, '2024-12-18 13:47:11', '2024-11-28 08:18:42', 39, 'Cà chua beef hướng hữu cơ là giống cà chua cao cấp khác hẳn cà chua thông thường ở điểm quả cà chua to, chắc, ít hạt, cơm dày.  Cà chua beef cung cấp một lượng Vitamin A, C, K tuyệt vời. Những chất này có tác dụng giúp tăng cường thị lực, phòng bệnh quáng gà. Ngoài ra, cà chua beef hữu cơ còn là loại thực phẩm giúp kiểm soát lượng đường trong máu, có canxi hỗ trợ cho xương chắc khỏe. Cà chua là loại thực phẩm được sử dụng phổ biến trong mỗi bữa ăn cũng như trong làm đẹp của chị em phụ nữ. Tuy nhiên để đảm bảo an toàn thì chúng ta nên chọn cà chua beef hướng hữu cơ hoặc cà chua bi hướng hữu cơ. Thành phần dinh dưỡng của cà chua beef hướng hữu cơ: Cà chua beef là nguồn cung cấp vitamin A, C, K, Các chất carotenoid và bioflavonoid, chất xơ... Quy trình sản xuất cà chua beef hướng hữu cơ: Cà chua beef hướng hữu cơ được trồng bởi trang trại rau organicfood.vn theo phương pháp hữu cơ, đảm bảo không sử dụng thuốc trừ sâu, thuốc kích thích, phân bón hóa học hay bất kì chất độc hại nào.', 0),
(13, 'Bông cải xanh baby hữu cơ 250g', 'bong_cai_xanh_baby_huu_co_e7962ebc7b5c45b686bbbdb1d411c673_grande.webp', 2, '2024-12-18 13:47:37', '2024-11-28 08:18:42', 58, 'Bông cải xanh hoặc súp lơ xanh, là một loại cây thuộc họ cải, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị. ', 1),
(14, 'Khổ qua hữu cơ - 300g', 'kho-qua-huu-co_6465f3e31e9e4c9c97fbb803604bf6c7_grande.jpg', 2, '2024-12-18 13:48:01', '2024-11-28 08:18:42', 45, 'Trên lâm sàng, khổ qua thường dùng chữa các chứng do bệnh nhiệt gây thử nhiệt phiền khát, trúng thử (say nóng), ung sưng, mắt đỏ đau nhức, kiết lỵ, viêm quầng, nhọt độc, tiểu ít…   \r\nKhổ qua (mướp đắng) – Momordia charantia L. thuộc họ Hồ lô (Cucurbitaceae). Vị đắng, tính mát, không độc. Vào kinh tâm, can, tỳ và vị. ', 0),
(15, 'Đọt rau lang hữu cơ - 300g', 'dot_rau_lang_organic_db894f83890b41e18e21186e994179d6_grande.webp', 2, '2024-12-18 13:48:26', '2024-11-28 08:18:42', 38, 'Rau khoai lang là thứ rau dân dã trước đây chỉ dành cho nhà nghèo. Ngày nay, người ta đã \"phát hiện\" ra rằng thứ rau này cũng rất ngon và có nhiều tác dụng đối với sức khỏe. Ở một số nước như châu Âu, Hồng Kông, Nhật Bản... rau khoai lang không còn là loại rau dân dã mà đã trở thành một loại thực phẩm cao cấp có mặt trong những nhà hàng sang trọng. Đây là một loại thực phẩm bổ dưỡng hơn nhiều lần so với những gì người ta vẫn nghĩ về loại rau này. Trong y học cổ truyền, rau khoai lang đã được coi là một vị thuốc với nhiều tên gọi khác nhau như cam thử, phiên chử, là một loại rau có tính bình, vị ngột, ích khí hư... Rau khoai lang không độc, tư thận âm, chữa tỳ hư, tác dụng bồi bổ sức khỏe, thanh can, lợi mật, giúp tăng cường thị lực, chữa bệnh vàng da, phụ nữ kinh nguyệt không đều, nam giới di tinh... Các nhà khoa học phát hiện ra rằng dinh dưỡng trong rau khoai lang còn tốt hơn trong củ khoai lang rất nhiều. Ví dụ: Vitamin B6 trong lá khoai lang cao gấp 3 lần trong củ khoai, vitamin C cao gấp 5 lần, viboflavin cao gấp 10 lần. Dinh dưỡng trong lá khoai lang tương đương với một loại \"siêu\" thực phẩm là rau chân vịt, nhưng lượng axit axalic trong rau khoai lang ít hơn rất nhiều lần so với rau chân vịt, vì thế nguy cơ gây bệnh sỏi thận của rau khoai lang cũng ít hơn.', 0),
(16, 'Cà chua bee ngọt hữu cơ - 300g', 'ca-chua-bee-cherry-huu-co_2afe5b08b1f242809cac54171701fff4_grande.jpg', 2, '2024-12-18 13:48:49', '2024-11-28 08:18:42', 56, 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.', 1),
(17, 'Đậu cove pháp hữu cơ - 250g', 'dau_cove_phap_52129ff4135745a6a45ef28a0f7dc677_grande.png', 2, '2024-12-18 13:49:12', '2024-11-28 08:18:42', 45, 'Đậu cove (hay đậu que) là một loại thực phẩm được ưa chuộng trên khắp thế giới. Chúng không chỉ mang đến giá trị dinh dưỡng to lớn mà còn mang đến nhiều lợi ích cho sức khỏe.\r\nLoại đậu này tính ôn, có tác dụng nhuận tràng, bồi bổ nguyên khí. Đậu cô ve không chỉ có chứa nhiều nguyên tố vi lượng như protein, canxi, sắt, mà còn có nhiều kali, magie, ít natri. Đậu cô ve rất thích hợp với những người bị bệnh tim, thận, cao huyết áp. Khi ăn cần chú ý nấu chín, nếu không dễ bị ngộ độc.', 0),
(18, 'Đậu hà lan non nguyên trái organik khay 200g', 'dau-ha-lan_67c60fc704a7441db650531bce487495_grande.webp', 2, '2024-12-18 13:49:34', '2024-11-28 08:18:42', 59, 'Thông tin sản phẩm đang được cập nhật', 0),
(19, 'Cải bó xôi hữu cơ - 250g', 'cai-bo-xoi-huu-co_dcef0c0e1fc1491599583cc06a19b830_grande.webp', 2, '2024-12-18 13:50:06', '2024-11-28 08:18:42', 43, 'Cải bó xôi còn gọi là rau chân vịt, ba thái, có tên khoa học là Spinacia oleracea L. Chenopodiaceae. Cải bó xôi thường có cuống nhỏ và lá xanh đậm, lá mọc chụm lại ở một gốc bé xíu. Thân và lá dòn, dễ gãy, dập. Cải bó xôi không những là một món ăn ngon mà còn có tác dụng rất “thần kỳ” trong y học để phòng và chữa nhiều bệnh ', 1),
(20, 'Cải kale hữu cơ-250g', 'cai-kale-huu-co_ae3cdc590cc4408baef391f07d422596_grande.jpg', 2, '2024-12-18 13:50:26', '2024-11-28 08:18:42', 62, 'Cải Kale là một loại rau với lá xanh, có họ gần với bắp cải hơn các loại rau trồng khác. Với đặc tính khá cứng nên phải nấu khá lâu mới mềm (như rau ngót). Cải Kale rất giàu chất xơ, canxi cùng nhiều vitamin (như vitamin C, A, K…) và khoáng chất có lợi khác(như sắt, canxi, kali, mangan và phốt pho…)     CÁCH BẢO QUẢN Cách 1: Bảo quản trong tủ lạnh Chỉ cần bảo quản trong tủ lạnh là có thề giữ Cải kale tươi từ 4 đến 5 ngày. Bên cạnh đó, để giữ được cải Kale tươi nhất, bạn nên gói trong giấy báo hoặc 1 chiếc khăn ẩm rồi cho vào trong tủ lạnh. Tránh để lá tiếp xúc trực tiếp với hơi lạnh gây héo. Cách 2: Trụng sơ trước khi cho vào tủ lạnh Thay vì bỏ trực tiếp vào tủ lạnh, bạn có thể cắt lấy lá Cải kale trụng sơ. Sau đó, cho vào hộp nhựa và bảo quản trong tủ lạnh. Cách thức này giúp bạn bảo quản từ 4-5 ngày, ưu điểm của nó là không sợ cải Kale bị vàng. Tuy nhiên, không trụng quá chín, chỉ trụng sơ vừa chín tới.', 0),
(21, 'TÔM ĐẤT THIÊN NHIÊN CẮT ĐẦU 300G', 'untitled_design__1__506514ce1ad44c99a9b8a8e386ee0475_grande.jpg', 3, '2024-12-18 13:51:05', '2024-11-28 08:23:53', 134, 'Thông tin sản phẩm đang được cập nhật', 0),
(22, 'CÁ CHẼM NƯỚC LỢ CẮT VIÊN GÓI 300G', '-thom-ngon-xuat-hien-trong-nha-hang-2-1662309364-635-width780height488_28f717a32e3a462e9dd594ebc0b9bd31_grande.jpg', 3, '2024-12-18 13:51:36', '2024-11-28 08:23:53', 184, 'Thông tin sản phẩm đang được cập nhật', 0),
(23, 'Tôm Đất Sinh Thái 250g', '1_34365e48339e4bbfba06b1de6dfb17cf_grande.jpg', 3, '2024-12-18 13:52:09', '2024-11-28 08:23:53', 100, 'Tôm đất sinh thái là sản phẩm tự nhiên, được nuôi dưỡng trong môi trường sinh thái hoàn toàn tự nhiên và không sử dụng bất kỳ hóa chất hay thức ăn công nghiệp nào. Tôm đất của chúng tôi được nuôi tại các vùng đất ven biển, nơi có điều kiện nước và khí hậu lý tưởng để tôm phát triển mạnh mẽ và đạt chất lượng cao nhất.', 1),
(24, 'Huyết heo hữu cơ', '3ahavdatsrisiu6nk7jn_huyet-heo-thumbnail_2x_67830e716509463a875ed7d33651ac7a_grande.jpg', 3, '2024-12-18 13:52:32', '2024-11-28 08:23:53', 234, 'Huyết heo không có sẵn tại cửa hàng, quý khách hàng có nhu cầu order sản phẩm vui lòng đặt trước.\r\nQuy cách đóng gói: 1kg', 0),
(25, 'Gà tre thả vườn làm sạch - 800g/con (đông lạnh)', 'thiet_ke_chua_co_ten__40__e70577b28a9a4c528d345cef177db6b5.webp', 3, '2024-12-18 13:52:49', '2024-11-28 08:23:53', 289, 'Thương hiệu: Người Giữ Rừng\r\nXuất xứ: Việt Nam\r\nTrọng lượng sản phẩm: 600-800g/con\r\nMô tả sản phẩm:\r\n- Gà tre có thịt ngọt, dai và thơm hơn hẳn so với nhiều giống gà khác\r\n- Gà tre đã được làm sạch, để nguyên con. Bạn có thể chặt gà ra để kho, luộc, chiên,\r\nHướng dẫn bảo quản:\r\n- Trong ngăn mát tủ lạnh ở nhiệt độ 0 – 4 độ C', 0),
(26, 'Gà trống cúng ( đặt trước )', 'ga-trong-cung_2e380f683e8b4d27aedbe1bc324cc6a2_grande.jpg', 3, '2024-12-19 09:37:20', '2024-11-28 08:23:53', 312, 'Một vật phẩm không thể thiếu trong các mâm cúng vào đêm giao thừa - gà trống luôn được lựa chọn một cách kỹ lưỡng: gà phải không khuyết tật, màu đỏ, mỏ vàng, chân vàng để nhằm thể hiện được kính trọng với tổ tiên ông bà, cũng như mong muốn một năm mới đến vạn sự bình an, an khang thịnh vượng. Gà trống cúng nhà Organicfood được làm sạch kỹ lưỡng, một con có trọng lượng từ 1,5Kg - 1,7Kg vừa đủ to để cho mâm cúng vung đầy cũng không quá lớn làm mất đi vẻ mỹ quan của mâm cúng ngày Tết.  Bạn có thể yên tâm rằng gà trống nhà Organicfood tuy được làm sạch nhưng vẫn có đầy đủ các bộ phận cần thiết để gia đình thực hiện các nghi lễ thời cúng.', 0),
(27, 'Thịt thăn iberico organic không xương - 450g', 'thit_than_iberico_khong_xuong_dong_lanh_-_450g_9b23c218a9404ac19e95d23bce8cd743_grande.png', 3, '2024-12-19 09:38:06', '2024-11-28 08:23:53', 326, 'Heo Iberico là một giống heo bản địa của Tây Ban Nha, màu đen mặt nhọn. Giống heo này có cấu tạo gen cho phép tích mỡ đến 49% trọng lượng cơ thể khi được vỗ béo. Có 4 điều mơ ước trong thế giới ẩm thực – đó là socola Trufles, trứng cá Caviar, gan ngỗng béo và thịt heo Iberico.\r\nThức ăn chính của heo Iberico là hạt dẻ sồi, cỏ, đậu và ngũ cốc. Những hạt này có tỉ lệ chất béo lớn, một trong số đó là axit béo không bão hoà oleic (một loại cholesteron tốt cho cơ thể con người).', 0),
(28, 'Thịt dẻ sườn heo iberico organic không xương - 250g', 'thit_de_suon_heo_iberico_khong_xuong_dong_lanh_-_250g_67b4f7261cb74ab3bc30b5b1c50ce797_grande.webp', 3, '2024-12-19 09:38:48', '2024-11-28 08:23:53', 266, 'Heo Iberico là một giống heo bản địa của Tây Ban Nha, màu đen mặt nhọn. Giống heo này có cấu tạo gen cho phép tích mỡ đến 49% trọng lượng cơ thể khi được vỗ béo. Có 4 điều mơ ước trong thế giới ẩm thực – đó là socola Trufles, trứng cá Caviar, gan ngỗng béo và thịt heo Iberico.\r\nThức ăn chính của heo Iberico là hạt dẻ sồi, cỏ, đậu và ngũ cốc. Những hạt này có tỉ lệ chất béo lớn, một trong số đó là axit béo không bão hoà oleic (một loại cholesteron tốt cho cơ thể con người).\r\nQuy trình nuôi heo Iberico ra sao?', 0),
(29, 'Ba rọi rút sườn heo organic - 500g', 'ba_roi_rut_suon_heo_huu_co_eef9b174de464c9ba735ee4c2126c8fa_grande.jpg', 3, '2024-12-19 09:39:18', '2024-11-28 08:23:53', 215, 'Các sản phẩm thịt tại Organicfood.vn là dòng sản phẩm chế biến từ nông sản chất lượng cao trong và ngoài nước. Mỗi sản phẩm được lựa chọn phải trải qua quá trình nghiên cứu kỹ lưỡng về nguồn gốc xuất xứ, đặc điểm sinh thái để chọn ra các nông sản chất lượng cao nhất. Qua quá trình chế biến bằng công nghệ hiện đại với các quy trình sản xuất khép kín được kiểm soát chặt chẽ đã cho ra đời các sản phẩm cao cấp nhưng vẫn mang đậm truyền thống địa phương.', 1),
(30, 'Nạc xay heo hữu cơ 320g', 'nac-xay_3cd338fbe9e842da8334514b89b1456f_grande.jpg', 3, '2024-12-19 09:39:50', '2024-11-28 08:23:53', 100, 'Thịt nạc xay giàu protein, là nguồn dinh dưỡng cần thiết để tái tạo lại cơ bắp sau khi tập thể dục và giúp tăng cường miễn dịch. Ngoài ra, thịt nạc xay cũng rất giàu chất đạm, giúp xây dựng cơ thể và tạo cho cơ thể được rắn chắc. \r\nThịt nạc xay sạch là lựa chọn số một của các chị em trong việc nấu các món ăn cho bé và gia đình mình. Thịt nạc xay có thể được chế biến thành nhiều món khác nhau như cháo, canh củ cải trắng với thịt xay... Sử dụng thịt nạc xay sạch, bạn hoàn toàn an tâm về một sản phẩm cao cấp đúng chuẩn hữu cơ, dựa vào quy trình chăn nuôi khép kín từ thức ăn, chăn nuôi chọn lọc, đến giết mổ và vận chuyển. ', 0),
(31, 'Bánh Gạo Hữu Cơ Hoa Nắng Vị Nguyên Bản 70g', 'untitled_design__3__b57bde586ad54425b3df1be17c72aed7_grande.jpg', 4, '2024-12-19 09:40:23', '2024-11-28 08:26:50', 25, '100% từ gạo hữu cơ Hoa Nắng\r\nKhông chiên\r\nKhông cholesterol\r\nKhông trans-fat\r\nGiòn tan , thơm ngon\r\nPhù hợp cho đối tượng ăn kiêng, eat clean, hỗ trợ giảm cân, ăn chay, bé trên 1 tuổi,…', 0),
(32, 'Bánh gạo lứt Homnin hữu cơ Lumlum 100g', 'banh_gao_luc_homnin_huu_co_lumlum_9bce676b87df45bf8000db6d9fe10797_grande.webp', 4, '2024-12-19 09:40:59', '2024-11-28 08:26:50', 90, 'Thông tin sản phẩm đang được cập nhật', 1),
(33, 'Bánh Gạo Lứt Tím Hữu Cơ Hoa Nắng 70g', 'untitled_design__4__6e94fa1d33a94ed29f688021e2bbea4c_grande.jpg', 4, '2024-12-19 09:41:41', '2024-11-28 08:26:50', 34, '100% từ gạo hữu cơ Hoa Nắng\r\nKhông chiên\r\nKhông cholesterol\r\nKhông trans-fat\r\nGiòn tan , thơm ngon\r\nGiàu chất xơ, các lọai vitamin, khoáng chất, tốt cho sức khoẻ đặc biệt là người tiểu đường, béo phì, huyết áp, ăn kiêng giảm cân, người tập luyện thể thao giữ vóc dáng…', 0),
(34, 'Thực phẩm bổ sung bánh snack gạo hữu cơ Nobi Nobi vị socola 40g', 'thuc_pham_bo_sung_banh_snack_gao_huu_co_nobi_nobi_vi_socola_40g_6b53d25d232e4a74a74822c7de76d8d5_grande.jpg', 4, '2024-12-19 09:42:10', '2024-11-28 08:26:50', 43, 'Xuất xứ thương hiệu: Thái Lan\r\nThành phần: Gạo Jasmine hữu cơ 61.37%, đường nâu hữu cơ 14.75%, bột ca cao hữu cơ 9.5%, dầu hướng dương hữu cơ 9.2%, bột gia vị hữu cơ (chứa đậu nành) 4.2%, muối 0.3%, Calci carbonat (INS170(i)), vitamin E tự nhiên (INS307(b)).\r\n\r\nQuy cách: 40g\r\nHướng dẫn sử dụng: Ăn trực tiếp sau khi mở túi\r\nĐộ tuổi khuyến nghị: Từ 18 tháng tuổi trở lên\r\nHướng dẫn bảo quản: Nhiệt độ thường, nơi khô ráo thoáng mát, tránh ánh nắng trực tiếp\r\n\r\n', 0),
(35, 'Bánh hỏi hữu cơ Bích Chi 200g', 'banh_hoi_huu_co_bich_chi_519aa91d028c4c248ab6d126f317bde8_grande.jpg', 4, '2024-12-19 09:42:31', '2024-11-28 08:26:50', 43, 'Thành phần Gạo hữu cơ 100%.\r\nCách dùng:\r\n- Chế nước sôi vào cho ngập bánh hỏi.\r\n- Đậy kín lại khoảng 1.5 - 2 phút.\r\n- Vớt ra để ráo rồi dùng ngay.\r\n- Hoặc ngâm bánh hỏi trong nước ấm khoảng 2 phút. Hấp khoảng 4 - 5 phút.\r\nLưu ý - phải thoa dầu vô xửng hấp', 0),
(36, 'Bún gạo trắng Hoa Sữa 500g', 'bun_gao_trang_hoa_sua_500g_5266b5d0c597479ab14b7e08b7115370_grande.webp', 4, '2024-12-19 09:42:52', '2024-11-28 08:26:50', 54, 'Sản phẩm bún gạo trắng Hoa Sua Foods 100% tự nhiên đảm bảo an toàn cho sức khỏe, là nguyên liệu cho nhiều món ăn, tiện lợi và dễ chế biến. Bún gạo trắng hoàn toàn không sử dụng hóa chất, chất bảo quản trong quá trình chế biến.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(255) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `username`, `password`, `level`, `fullName`, `company`, `email`, `phone`, `address`) VALUES
(1, 'admin', '123456', 1, '', '', '', '', ''),
(2, 'nguyenvana', '111111', 2, '', '', '', '', ''),
(11, '123', '111', 2, '', '', '', '', ''),
(17, 'vup', '111', 2, 'vuxx', '111', '123@gmail.com', '111111', 'asdasdfasdf');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
