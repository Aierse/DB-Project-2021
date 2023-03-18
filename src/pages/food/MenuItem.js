import styles from "./MenuItem.module.css";

function MenuItem({ value, selected, setSelected }) {
  return (
    <label className={styles.item}>
      <input type="radio" name="category" value={value} checked={selected === value} onChange={setSelected} />
      <span>{value.toUpperCase()}</span>
    </label>
  );
}

export default MenuItem;
