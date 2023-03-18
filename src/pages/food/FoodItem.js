import styles from "./FoodItem.module.css";

function FoodItem({ image, name, price }) {
  return (
    <div className={styles.item}>
      <img src={image} alt="음식 이미지" />
      <h3>{name}</h3>
      <p>{price}원</p>
    </div>
  );
}

export default FoodItem;
