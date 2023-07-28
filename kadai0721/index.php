<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Shopping</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ethical Shopping</h1>
    </header>
    <main>
        <?php
        // ShoppingCartクラスの読み込み
        require_once('ShoppingCart.php');

        // データベース接続情報
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'gs_ethical';

        // データベースへの接続
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die('データベース接続エラー：' . $conn->connect_error);
        }

        // 商品情報を取得
        $products = array();
        $sql = "SELECT id, name, price FROM gs_ethical";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        // ショッピングカートの処理
        $cart = new ShoppingCart();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_to_cart'])) {
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $cart->addItem($product_id, $quantity);
            } elseif (isset($_POST['remove_from_cart'])) {
                $product_id = $_POST['product_id'];
                $cart->removeItem($product_id);
            }
        }

// 商品リストの表示
echo '<div class="product-list">';
foreach ($products as $product) {
    echo '<div class="product">';
    echo '<h3>' . $product['name'] . '</h3>';
    echo '<p>価格: ' . $product['price'] . '円</p>';
    echo '<form method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
    echo '数量: <input type="number" name="quantity" value="1" min="1">';
    echo '<button type="submit" name="add_to_cart">カートに追加</button>';
    echo '</form>';
    echo '</div>';
}
echo '</div>';

// ショッピングカートの表示
echo '<div class="shopping-cart">';
echo '<h2>ショッピングカート</h2>';
$cart_items = $cart->getItems();
if (!empty($cart_items)) {
    echo '<ul>';
    foreach ($cart_items as $item) {
        // 商品が存在する場合にのみアクセスを行う
        $product_index = array_search($item['product_id'], array_column($products, 'id'));
        if ($product_index !== false) {
            $product = $products[$product_index];

            // $productが配列であることを確認する
            if (is_array($product) && isset($product['price'])) {
                echo '<li>' . $product['name'] . ' x ' . $item['quantity'] . ' = ' . ($product['price'] * $item['quantity']) . '円';
                echo '<form method="post">';
                echo '<input type="hidden" name="product_id" value="' . $item['product_id'] . '">';
                echo '<button type="submit" name="remove_from_cart">カートから削除</button>';
                echo '</form>';
                echo '</li>';
            }
        }
    }
    echo '</ul>';
    echo '<p>合計金額: ' . $cart->getTotalPrice($products) . '円</p>';
} else {
    echo '<p>カートは空です。</p>';
}
echo '</div>';

        // データベース接続を閉じる
        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> 環境に優しいショッピング. All rights reserved.</p>
    </footer>
</body>
</html>