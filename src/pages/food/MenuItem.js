import styles from "./MenuItem.module.css";

function MenuItem({ value }) {
  return (
    <label className={styles.item}>
      <input type="radio" name="category" value={value} />
      <span>{value.toUpperCase()}</span>
    </label>
  );
}

export default MenuItem;
