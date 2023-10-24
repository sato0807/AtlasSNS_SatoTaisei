// アコーディオンメニュー
// トグルボタン要素を取得
const toggleBtn = document.querySelector('.toggle_btn');
// メニューのul要素を取得
const menuContainer = document.querySelector('.menu_container');
// ul要素の縦幅を取得して、translateYで上に移動させておく
// (clientHeightはborder幅を含めないので、borderの幅を足す)
const menuContainerHeight = menuContainer.clientHeight;
// トグルボタンがクリックされたらトグルボタン要素にactiveクラスを付けたり外したりする
toggleBtn.addEventListener('click', () => {
  toggleBtn.classList.toggle('active');
  // ul要素にacitveクラスが含まれていなければクラスを付与し、transformで移動
  if (!menuContainer.classList.contains("active")) {
    menuContainer.classList.add("active");
    // opacityで隠しておいたメニューを表示（以降、opactyは1のままで良い）
    menuContainer.style.cssText = `
      opacity: 1;
      pointer-events: auto;
      `
    // クリックした際に機能を有効にする
  } else {
    // そうでない場合はactiveクラスを外してtransformで移動
    menuContainer.classList.remove("active");
    menuContainer.style.cssText = `
      opacity: 0;
      pointer-events: none;
      `
    // クリックした際に機能を無効にする
  }
});
// https://junpei-sugiyama.com/accordion/
// https://web-de-asobo.net/2023/06/01/accordion-menu/


$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納(「var post=」はphpの「$post =」と同じ意味)
    var post = $(this).attr('post');  //←クリックするときのデータの取得
    // 押されたボタンから投稿のidを取得し変数へ格納(どの投稿を編集するか特定するのに必要なため)
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);  //←クリックしたときのデータをモーダルに表示
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class= "js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  })
});
