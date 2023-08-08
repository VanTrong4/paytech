<?php
function list_prefect()
{
  return ["北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県", "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"];
}
function list_status()
{
  return ['new', 'review', 'contract', 'waiting_for_payment', 'complete', 'refuse', 'payment', 'unshipped'];
}
function application_status_admin($status)
{
  switch ($status) {
    case 'new':
      return "新規";
    case 'review':
      return "審査中";
    case 'contract':
      return "契約書";
    case 'waiting_for_payment':
      return "入金待ち";
    case 'complete':
      return "現客";
    case 'refuse':
      return "当社断り";
    case 'payment':
      return "決済";
    case 'unshipped':
      return "未発送";
    default:
      return $status;
  }
}
function application_status_customer($status)
{
  switch ($status) {
    case 'new':
      return "新規";
    case 'review':
      return "審査中";
    case 'contract':
      return "契約書";
    case 'waiting_for_payment':
      return "入金待ち";
    case 'complete':
      return "完了済み";
    case 'refuse':
      return "完了済み";
    case 'payment':
      return "完了済み";
    case 'unshipped':
      return "未発送";
    default:
      return $status;
  }
}
function canonical()
{
  $current = app('url')->current();
  $prefix = prefix();
  if ($prefix)
    $current = str_replace("/" . $prefix, '', $current);
  return $current;
  return app('url')->current();
}
function prefix()
{
  try {
    $prefix = "";
    $route = app('request')->route();
    if ($route)
      $prefix = $route->getPrefix();
    return $prefix !== 'admin' ? $prefix : '';
  } catch (\Exception $e) {
    return '';
  }
}
function lp()
{
  if ($prefix = prefix()) return $prefix . ".";
  return '';
}

function lp_pages()
{
  return config('admin.lp_pages') ? explode(",", config('admin.lp_pages')) : [];
}
function is_not_lighthouse()
{
  if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') !== false) {
    return false;
  }
  return true;
}
