package org.magnitude.stock.dao.impl;

import org.magnitude.stock.dao.IStockDAO;
import org.magnitude.stock.dao.StockTransactionDTO;
import org.magnitude.stock.exception.SystemFailureException;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataAccessException;
import org.springframework.jdbc.core.JdbcTemplate;

import java.sql.Types;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class StockDAOImpl implements IStockDAO {
    private static final Logger logger = LoggerFactory.getLogger(StockDAOImpl.class);

    private static final String QUERY_TO_LOOKUP_TRANSACTION = "SELECT TRANSACTION_DATE, STOCK, TYPE, PRICE, QTY FROM STOCK_TRANSACTION WHERE TRANSACTION_DATE BETWEEN ? AND ? ORDER BY TRANSACTION_DATE";

    private JdbcTemplate jdbcTemplate;

    @Autowired
    public void setJdbcTemplate(JdbcTemplate jdbcTemplate) {
		this.jdbcTemplate = jdbcTemplate;
	}
    @Override
    public List<StockTransactionDTO> lookupAllStockTransaction(Date startingDate, Date endingDate) throws SystemFailureException {
        logger.debug("Executing::StockDAOImpl.lookupAllStockTransaction()...");

        if (startingDate == null || endingDate == null) {
            logger.error("Required parameters are missing. Please provide starting and ending date.");
            throw new IllegalArgumentException("Required parameters are missing. Please provide starting and ending date.");
        }
        logger.info("Executing:: Query: {}, parameters: {}, {}", QUERY_TO_LOOKUP_TRANSACTION, startingDate, endingDate);
        try {

            List<StockTransactionDTO> transactionDTOs = jdbcTemplate.query(QUERY_TO_LOOKUP_TRANSACTION, new Object[]{startingDate, endingDate}, new int[]{Types.TIMESTAMP, Types.TIMESTAMP},
                    resultSet -> {
                        List<StockTransactionDTO> transactionDTOS = new ArrayList<>();
                        while (resultSet.next()) {
                            transactionDTOS.add(
                                    new StockTransactionDTO(
                                            resultSet.getDate("TRANSACTION_DATE"),
                                            resultSet.getString("STOCK"),
                                            resultSet.getString("TYPE"),
                                            resultSet.getDouble("PRICE"),
                                            resultSet.getInt("QTY"))
                            );
                        }
                        return transactionDTOS;
                    });
            logger.debug("Exiting::StockDAOImpl.lookupAllStockTransaction(numberOfTransaction: {})...", transactionDTOs.size());
            return transactionDTOs;
        } catch (DataAccessException e) {
            logger.error("Error occurred while performing reading query on database.", e);
            throw new SystemFailureException("Error occurred while performing reading query on database.", e);
        }
    }
}
